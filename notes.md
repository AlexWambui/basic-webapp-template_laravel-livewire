# TODOS

# FEATURES
- Authentication and Role-Based Authorization.
- User Management.
- Contact Form Messages.

# DB DESIGN
```
users {
    id();
    string('name');
    string('email')->unique();
    string('phone_number')->nullable();
    string('secondary_phone_number')->nullable();
    string('avatar')->nullable();
    unsignedTinyInteger('role')->default(3);
    unsignedTinyInteger('status')->default(1);
    timestamp('email_verified_at')->nullable();
    string('password');
    rememberToken();
    timestamps();
}

contact_messages {
    id();
    string('name');
    string('email');
    string('phone_number');
    string('message', 2000);
    boolean('is_read')->default(0);
    boolean('is_important')->default(0);
    timestamps();
}
```

# ENUMS
```
USER_ROLES: [
    SUPER_ADMIN = 0;
    ADMIN = 1;
    OWNER = 2;
    USER = 3;
]

USER_STATUSES: [
    INACTIVE = 0;
    ACTIVE = 1;
    BANNED = 2;
]
```
