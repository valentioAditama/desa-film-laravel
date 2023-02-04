<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Users</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    @csrf
                    <!-- Fullname input -->
                    <div class="form-outline mb-3">
                        <input type="text" id="form7Example1" class="form-control" />
                        <label class="form-label" for="form7Example1">Name</label>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-3">
                        <input type="email" id="form7Example2" class="form-control" />
                        <label class="form-label" for="form7Example2">Email</label>
                    </div>

                    <!-- Role input -->
                    <div class="mb-3">
                        <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                        <select class="form-control">
                            <option selected>Choose Role</option>
                            <option value="Admin">Admin</option>
                            <option value="User">Users</option>
                        </select>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-1">
                        <input type="password" id="form7Example4" class="form-control" />
                        <label class="form-label" for="form7Example4">Password</label>
                    </div>

                    <!-- Show Password -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="form11Example5" onclick="showPassword()" />
                        <label class="form-check-label" for="form11Example5"> Show Password </label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    function showPassword() {
        pass = document.getElementById("form7Example4");
        if (pass.type === "password") {
            pass.type = "text";
        } else {
            pass.type = "password";
        }
    }
</script>