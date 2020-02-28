<?php
/**
 * Project: hajjtrack.
 * User: naveed
 * Date: 12/07/2018
 * Time: 1:21 PM
 */
?>
@if(isset($errors) && $errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
@if(Session::has('error_message'))
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            <span class="sr-only">Close</span>
        </button>
        <strong></strong>  {{ Session::get('error_message') }}
    </div>
@endif
@if(Session::has('success_message'))
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            <span class="sr-only">Close</span>
        </button>
        <strong></strong>  {{ Session::get('success_message') }}
    </div>
@endif

@if(Session::has('warning_message'))
    <div class="alert alert-warning" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            <span class="sr-only">Close</span>
        </button>
        <strong></strong> {{ Session::get('warning_message') }}
    </div>
@endif

