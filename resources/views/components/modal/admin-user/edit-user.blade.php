<!-- Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="editmodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editmodalLabel">Edit Users</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/dataUser/post" method="post">
                @csrf
                <div class="modal-body">
                    <!-- Get ID -->
                    <input type="text" id="id-users" value="">

                    <!-- Fullname input -->
                    <div class="form-outline mb-3">
                        <input type="text" id="name" name="name" class="form-control" />
                        <label class="form-label" for="name">Name</label>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-3">
                        <input type="email" id="email" name="email" class="form-control" />
                        <label class="form-label" for="email">Email</label>
                    </div>

                    <!-- Role input -->
                    <div class="mb-3">
                        <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                        <select class="form-control" name="role" id="role">
                            <option selected>Choose Role</option>
                            <option value="Admin">Admin</option>
                            <option value="User">Users</option>
                        </select>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-1">
                        <input type="password" name="password" id="password" class="form-control" />
                        <label class="form-label" for="password">Password</label>
                    </div>

                    <!-- Show Password -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="form11Example5" onclick="showPassword()" />
                        <label class="form-check-label" for="form11Example5"> Show Password </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function showPassword() {
        var pass = document.getElementById("password");
        if (pass.type === "password") {
            pass.type = "text";
        } else {
            pass.type = "password";
        }
    }

    function edit() {
        var idUsers = $("#btn-edit-users").attr("data-target");

        alert(idUsers);

        // Fetching detail data with ajax
        $.ajax({
            url: `/dataUser/edit/${$id}`,
            type: "GET",
            cache: false,
            success: function(response) {

                // fill data to form 
                let id = $('#id-users').val(response.id);
                let name = $('#name').val(response.name);
                let email = $('#email').val(response.email);

                console.log(id);

            }
        });
    };
</script>