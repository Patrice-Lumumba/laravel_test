<?php
?>

@include('layouts.app')

<div class="container">
    <h2>Edit User</h2>

    </a>
    <div class="row">
        <div class="col">
            <form action="/user-update/{{$user->id}}" method="post">
                <div class="form-group">
                    <label for=""> Full Name </label>
                    <input type="text" class="form-control" placeholder="Enter First Name" required value="{{$user->name}}>
                </div>
                <div class="form-group">
                    <label for=""> Email </label>
                    <input type="text" class="form-control" placeholder="Enter Email" required value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <label for=""> Phone number </label>
                    <input type="text" class="form-control" placeholder="Enter Phone number" required value="{{$user->tel}}">
                </div>

                <div class="form-group">
                    <label for=""> Check In </label>
                    <input type="datetime-local" class="form-control" placeholder="000000" required value="{{$user->check_in}}">
                </div>

                <div class="form-group">
                    <label for=""> Check Out </label>
                    <input type="datetime-local" class="form-control" placeholder="000000" required value="{{$user->check_out}}">
                </div>

                <div class="form-group">
                    <label for=""> Rôle </label>
                    <input type="text" name="contact" class="form-control" placeholder="Rôle" required value="{{$user->role}}">
                </div>

                <button class="btn btn-primary" type="submit" name="insert"> Update Data </button>

                <a href="/users" class="btn btn-danger"> CANCEL</a>
            </form>
        </div>
    </div>

</div>
