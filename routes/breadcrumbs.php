<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Illuminate\Support\Facades\Crypt;

//* Breadcrumbs Admin

// Master
Breadcrumbs::for('master', function (BreadcrumbTrail $trail) {
    $trail->push('Master', route('dashboard.admin'));
});
// Master > Dashboard
Breadcrumbs::for('dashboard.admin', function (BreadcrumbTrail $trail) {
    $trail->parent('master');
    $trail->push('Dashboard', route('dashboard.admin'));
});
// Master > Materi
Breadcrumbs::for('materi.admin', function (BreadcrumbTrail $trail) {
    $trail->parent('master');
    $trail->push('Materi', route('materi.index'));
});
// Master > Materi > [ID]
Breadcrumbs::for('materi.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('materi.admin');
    $trail->push(substr(Crypt::encrypt($id->id), 0, 10), route('materi.edit', $id));
});
// Master > User
Breadcrumbs::for('user', function (BreadcrumbTrail $trail) {
    $trail->parent('master');
    $trail->push('User', route('user.index'));
});
// Master > User > [ID]
Breadcrumbs::for('user.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('user');
    $trail->push(substr(Crypt::encrypt($id->id), 0, 10), route('user.edit', $id));
});
// Master > Asesmen
Breadcrumbs::for('asesmen.admin', function (BreadcrumbTrail $trail) {
    $trail->parent('master');
    $trail->push('Asesmen', route('asesmens.index'));
});
// Master > Asesmen > Hasil
Breadcrumbs::for('hasil.asesmen', function (BreadcrumbTrail $trail) {
    $trail->parent('asesmen.admin');
    $trail->push('Hasil', route('hasil-asesmen'));
});
// Master > Materi > [ID]
Breadcrumbs::for('asesmen.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('asesmen.admin');
    $trail->push(substr(Crypt::encrypt($id->id), 0, 10), route('asesmen.edit', $id));
});
// Master > Diskusi
Breadcrumbs::for('diskusi.admin', function (BreadcrumbTrail $trail) {
    $trail->parent('master');
    $trail->push('Diskusi', route('diskusi.index'));
});

//* Breadcrumbs Admin

// Learning
Breadcrumbs::for('learning', function (BreadcrumbTrail $trail) {
    $trail->push('Learning', route('learning'));
});
// Learning > Dashboard
Breadcrumbs::for('dashboard.learning', function (BreadcrumbTrail $trail) {
    $trail->parent('learning');
    $trail->push('Dashboard', route('learning'));
});
// Learning > Materi
Breadcrumbs::for('materi', function (BreadcrumbTrail $trail) {
    $trail->parent('learning');
    $trail->push('Materi', route('learning'));
});
// Learning > Materi > [ID]
Breadcrumbs::for('materi.learning', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('materi');
    $trail->push($id, route('materi.learning', $id));
});
// Learning > Diskusi
Breadcrumbs::for('diskusi', function (BreadcrumbTrail $trail) {
    $trail->parent('learning');
    $trail->push('Diskusi', route('diskusi.learning'));
});

// Learning > Asesmen
Breadcrumbs::for('asesmen.learning', function (BreadcrumbTrail $trail) {
    $trail->parent('learning');
    $trail->push('Asesmen', route('asesmen.learning'));
});