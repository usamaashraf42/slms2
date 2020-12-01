<?php
if (!function_exists('jobApplicantAreRoutes')) {

function jobApplicantAreRoutes(Array $routes, $output = "menu-item-active")
{
  foreach ($routes as $route)
  {
    if (Route::currentRouteName() == $route) return $output;
  }

}
}
