<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'admin/course/has-section','/countryHasBranch','admin/parent/has-kids','admin/admissionPackage','admin/admissionPackageFirst','admin/bankHasChecque','admin/admissionPackageNulls','easypaisa/store','admin/branchHasClasses','admin/readonlyBranchSetting','pakistan/franchise/store','pakistan/jobs','feedeposit','pakistan/feedeposit','feedeposit-status','feedeposit-paypal','feeChallan'
    ];
}
