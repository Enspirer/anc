<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
});

require __DIR__.'/auth.php';
require __DIR__.'/log-viewer.php';

Breadcrumbs::for('admin.package.index', function ($trail) {
    $trail->push('Package', route('admin.package.index'));
});
Breadcrumbs::for('admin.package.create', function ($trail) {
    $trail->push('Create Package', route('admin.package.create'));
});
Breadcrumbs::for('admin.package.edit', function ($trail) {
    $trail->push('Edit Package', route('admin.package.edit',1));
});

Breadcrumbs::for('admin.order.index', function ($trail) {
    $trail->push('Orders', route('admin.order.index'));
});
Breadcrumbs::for('admin.order.edit', function ($trail) {
    $trail->push('Order Approval', route('admin.order.edit',1));
});
Breadcrumbs::for('admin.print', function ($trail) {
    $trail->push('Order Print', route('admin.print',1));
});

Breadcrumbs::for('admin.file_manager.index', function ($trail) {
    $trail->push('File Manager', route('admin.file_manager.index'));
});

Breadcrumbs::for('admin.settings.index', function ($trail) {
    $trail->push('General Settings', route('admin.settings.index'));
});

Breadcrumbs::for('admin.about_us', function ($trail) {
    $trail->push('About Us', route('admin.about_us'));
});

Breadcrumbs::for('admin.privacy_policy', function ($trail) {
    $trail->push('Privacy Policy', route('admin.privacy_policy'));
});

Breadcrumbs::for('admin.terms_and_conditions', function ($trail) {
    $trail->push('Terms and Conditions', route('admin.terms_and_conditions'));
});

Breadcrumbs::for('admin.contactus_thanks', function ($trail) {
    $trail->push('Contact Us Thanks Email', route('admin.contactus_thanks'));
});


