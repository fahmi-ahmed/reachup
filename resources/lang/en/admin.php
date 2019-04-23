<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => "ID",
            'first_name' => "First name",
            'last_name' => "Last name",
            'email' => "Email",
            'password' => "Password",
            'password_repeat' => "Password Confirmation",
            'activated' => "Activated",
            'forbidden' => "Forbidden",
            'language' => "Language",
                
            //Belongs to many relations
            'roles' => "Roles",
                
        ],
    ],

    'user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'name' => "Name",
            'email' => "Email",
            'email_verified_at' => "Email verified at",
            'mobile' => "Mobile",
            'description' => "Description",
            'service_type' => "Service type",
            'address' => "Address",
            'rating' => "Rating",
            
        ],
    ],

    'customer' => [
        'title' => 'Customers',

        'actions' => [
            'index' => 'Customers',
            'create' => 'New Customer',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'name' => "Name",
            'mobile' => "Mobile",
            'email' => "Email",
            
        ],
    ],

    'company' => [
        'title' => 'Companies',

        'actions' => [
            'index' => 'Companies',
            'create' => 'New Company',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            
        ],
    ],

    'company' => [
        'title' => 'Companies',

        'actions' => [
            'index' => 'Companies',
            'create' => 'New Company',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'name' => "Name",
            'mobile' => "Mobile",
            'address' => "Address",
            'type' => "Type",
            'rating' => "Rating",
            
        ],
    ],

    'type' => [
        'title' => 'Types',

        'actions' => [
            'index' => 'Types',
            'create' => 'New Type',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'name' => "Name",
            
        ],
    ],

    'service' => [
        'title' => 'Services',

        'actions' => [
            'index' => 'Services',
            'create' => 'New Service',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'name' => "Name",
            
        ],
    ],

    'menu' => [
        'title' => 'Menus',

        'actions' => [
            'index' => 'Menus',
            'create' => 'New Menu',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'company_id' => "Company",
            'type' => "Type",
            'name' => "Name",
            'price' => "Price",
            'category' => "Category",
            
        ],
    ],

    'category' => [
        'title' => 'Categories',

        'actions' => [
            'index' => 'Categories',
            'create' => 'New Category',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'name' => "Name",
            
        ],
    ],

    'menu' => [
        'title' => 'Menus',

        'actions' => [
            'index' => 'Menus',
            'create' => 'New Menu',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'company_id' => "Company",
            'type' => "Type",
            'name' => "Name",
            'price' => "Price",
            'category' => "Category",
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];