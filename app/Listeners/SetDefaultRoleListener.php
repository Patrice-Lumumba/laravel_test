<?php

    namespace App\Listeners;
    use Illuminate\Queue\InteractsWithQueue;
    use Illuminate\Contracts\Queue\ShouldQueue;
    use App\Models\User;

    class SetDefaultRoleListener {

        /**
         * @param User $event
         * @return void
         */

        public function handle(User $event) {
            $role = \App\Models\Role::where('name', 'user')->firstOrFail();
            $event->user->roles()->attach($role->id);
        }
    }
