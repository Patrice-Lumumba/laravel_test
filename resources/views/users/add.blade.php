<?php
?>

    @include('layouts.app')

    <div class="container">
        <h2>New User</h2>

        </a>
        <div class="row">
            <div class="col">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="/save-user"> Full Name </label>
                        <input type="text" name="fname" class="form-control" placeholder="Enter First Name" required>
                    </div>
                    <div class="form-group">
                        <label for=""> Email </label>
                        <input type="text" name="lname" class="form-control" placeholder="Enter Last Name" required>
                    </div>
                    <div class="form-group">
                        <label for=""> Phone number </label>
                        <input type="text" name="contact" class="form-control" placeholder="Enter Phone number" required>
                    </div>

                    <div class="form-group">
                        <label for=""> Check In </label>
                        <input type="datetime-local" name="contact" class="form-control" placeholder="000000" required>
                    </div>

                    <div class="form-group">
                        <label for=""> Check Out </label>
                        <input type="datetime-local" name="contact" class="form-control" placeholder="000000" required>
                    </div>

                    <div class="form-group">
                        <label for=""> Rôle </label>
                        <input type="text" name="contact" class="form-control" placeholder="Rôle" required>
                    </div>

                    <button class="btn btn-primary" type="submit" name="insert"> Save Data </button>

                    <a href="/users" class="btn btn-danger"> CANCEL</a>
                </form>
            </div>
        </div>

    </div>
