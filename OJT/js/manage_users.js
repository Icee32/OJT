$(document).ready(function() {
    $('#userstbl').DataTable({
        "dom": 'rtip',
        responsive: true
    });

    // Add user data
    $('#add').click(function() {
        // get values in the input forms
        var un = $('#addUsername').val();
        var role = $("input[name='typeuser']:checked").val();
        var fn = $('#addFirstName').val();
        var ln = $('#addLastName').val();
        var area = $('#addArea').val();
        var pass = $('#addPassword').val();

        $.ajax({
            url: 'api/user-crud.php',
            method: 'post',
            data: { 'save_user': true, Username: un, Role: role, FirstName: fn, LastName: ln, Area: area, Password: pass },
            success: function(response) {
                console.log(response);
                var res = jQuery.parseJSON(response);
                if (res.status == 422) {
                    Swal.fire({
                        title: "Warning",
                        text: res.message,
                        icon: "warning",
                        button: "OK"
                    });

                } else if (res.status == 200) {
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success(res.message);

                    $('#addModal').modal('hide'); // close modal

                    setTimeout(function() {
                        location.reload(); // Reload the current page
                    }, 1000);
                } else if (res.status == 500) {
                    alert(res.message);
                }
            }
        });
    });

    // Update user data
    $(document).on('click', 'a[data-role=update]', function() {
        //alert($(this).data('id'));

        var id = $(this).data('id'); // get row id
        var un = $('#' + id).children('td[data-target=Username]').text();
        var role = $('#' + id).children('td[data-target=Role]').text();
        var nm = $('#' + id).children('td[data-target=Name]').text(); // Combine FirstName and LastName
        var area = $('#' + id).children('td[data-target=Area]').text();
        var pass = $('#' + id).children('td[data-target=Password]').text();

        // Split the combined name into FirstName and LastName
        var names = nm.split(' ');
        var fn = names[0].trim();
        var ln = names.slice(1).join(' ').trim();

        // Display values in the input forms
        $('#Username').val(un);
        $("input[name=typeuser][value='" + role + "']").prop('checked', true);
        $('#FirstName').val(fn);
        $('#LastName').val(ln);
        $('#Area').val(area);
        $('#Password').val(pass);
        $('#userId').val(id);
        $('#myModal').modal('toggle'); // activate modal
    });

    $('#save').click(function(e) {
        e.preventDefault();

        // Get values in the input forms
        var id = $('#userId').val();
        var un = $('#Username').val();
        var role = $("input[name='typeuser']:checked").val();
        var fn = $('#FirstName').val();
        var ln = $('#LastName').val();
        var area = $('#Area').val();
        var pass = $('#Password').val();

        $.ajax({
            url: 'api/user-crud.php',
            method: 'post',
            data: { 'update_user': true, Username: un, Role: role, FirstName: fn, LastName: ln, Area: area, Password: pass, userId: id },
            success: function(response) {
                var res = jQuery.parseJSON(response);
                if (res.status == 422) {
                    Swal.fire({
                        title: "Warning",
                        text: res.message,
                        icon: "warning",
                        button: "OK"
                    });

                } else if (res.status == 200) {
                    Swal.fire({
                        title: "Success",
                        text: res.message,
                        icon: "success",
                        button: "OK"
                    });

                    $('#myModal').modal('hide'); // close modal

                    setTimeout(function() {
                        location.reload(); // Reload the current page
                    }, 2000);

                } else if (res.status == 500) {
                    alert(res.message);
                }
            }
        });
    });

    // Handle click on "Activate" action
    $(document).on('click', 'a[data-role=active]', function() {
        var userId = $(this).data('id');

        Swal.fire({
            title: 'Activate User',
            text: 'Are you sure you want to activate this user? This user will be able to log in.',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {
                // User confirmed to activate
                updateUserStatus(userId, true); // Call function to update user status
            }
        });
    });

    // Handle click on "Deactivate" action
    $(document).on('click', 'a[data-role=deact]', function() {
        var userId = $(this).data('id');

        Swal.fire({
            title: 'Deactivate User',
            text: 'Are you sure you want to deactivate this user? This user will not be able to log in.',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {
                // User confirmed to deactivate
                updateUserStatus(userId, false); // Call function to update user status
            }
        });
    });

    // Function to update user status (activate or deactivate)
    function updateUserStatus(userId, activate) {
        var action = activate ? 'active' : 'deact';

        $.ajax({
            url: 'api/user-crud.php',
            method: 'post',
            data: {
                [action]: true, 'userId': userId },
            dataType: 'json',
            success: function(response) {
                if (response.status == 200) {
                    var successMessage = activate ? 'User Activated!' : 'User Deactivated!';
                    Swal.fire(successMessage, response.message, 'success');
                    setTimeout(function() {
                        location.reload(); // Reload the current page
                    }, 2000);
                } else {
                    Swal.fire('Error', response.message, 'error');
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", error);
                Swal.fire('Error', 'Failed to update user status.', 'error');
            }
        });
    }

});