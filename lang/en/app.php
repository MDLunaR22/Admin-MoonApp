<?php

return [
    "title" => "MoonApp",
    "rutes" => [
        "status" => [
            "title" => "Statuses",
            "index" => "Status",
            "create" => "Create Status",
            "edit" => "Edit Status",
            "show" => "Show Status",
            "delete" => "Delete Status",
        ],
        "customer" => [
            "title" => "Customers",
            "index" => "Customers",
            "create" => "Create Customer",
            "edit" => "Edit Customer",
            "show" => "Show Customer",
            "delete"=> "Delete Customer",
        ],
        "package" => [
            "title" => "Packages",
            "index" => "Packages",
            "create" => "Create Package",
            "edit" => "Edit Package",
            "show" => "Show Package",
            "delete" => "Delete Package",
        ],
        "user" => [
            "title" => "Users",
            "index" => "Users",
            "create" => "Create User",
            "edit" => "Edit User",
            "show" => "Show User",
            "delete" => "Delete User",
        ],
        "role" => [
            "title" => "Roles",
            "index" => "Roles",
            "create" => "Create Role",
            "edit" => "Edit Role",
            "show" => "Show Role",
            "delete" => "Delete Role",
        ],
        "assign_permissions_role" => [
            "title" => "Assign Permissions to Role",
        ],
        "login" => "Login",
        "logout" => "Logout",
        "register" => "Register",
        "forgot_password" => "Forgot Your Password?",
        "reset_password" => "Reset Password",
    ],
    "inputs" => [
        "name" => "Name",
        "status_name" => "Status Name",
        "role_name" => "Role Name",
        "surname" => "Surname",
        "email" => "Email",
        "phone" => "Phone Number",
        "password" => "Password",
        "password_confirmation" => "Password Confirmation",
        "code" => "Code",
        "options" => "Options",
        "tracking" => "Tracking",
        "weight" => "Weight",
        "description" => "Description",
        "status" => "Status",
        "customer" => "Customer",
        "order" => "Order",
        "select_option" => "Select an option",
        "show_pass" => "Show Password",
        "permission" => "Permissions",
        "role" => "Role",
        "user" => "User",
        "guard_name" => "Guard Name",
    ],
    "options" => [
        "create" => "Create",
        "edit" => "Edit",
        "delete" => "Delete",
        "show" => "Show",
        "save" => "Save",
        "cancel" => "Cancel",
        "back" => "Back",
        "login" => "Login",
        "logout" => "Logout",
        "register" => "Register",
        "already_have_account" => "Already have an account? Login",
        "not_have_account" => "Not have an account? Register",
        "remember_password" => "Remembered your password? Login",
        "forgot_password" => "Send Password Reset Link",
        "reset"=> "Reset",
    ],
    "messages" => [
        "welcome_login" => "Welcome back",
        "welcome_home" => "Welcome to",
        "login" => "Log In to your account",
        "delete_message"=> "Are you sure you want to delete this record? This action can not be undone.",
        "forgot_password" => "Enter your email address and we'll send you a link to reset your password.",
        "success_added" => "Record added successfully!",
        "success_updated" => "Record updated successfully!",
        "success_deleted" => "Record deleted successfully!",
        "error_is_in_use"=> " is in use and can not be deleted",
        "error_deleted_role"=> "Super admin can not be deleted",
    ],
    "language"=> [
        "title"=> "Language",
        "spanish" => "Spanish",
        "english" => "English",
    ],
    "mail" => [
        "welcome" => "Welcome",
        "your_password" => "Your password is:",
        "enter_our_site" => "Enter our site",
    ],
    'exist' => [
        'role'=> 'The role already exists',
    ]
];