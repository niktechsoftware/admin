<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'login';

$route['404_override'] = '';

$route['dashboard'] = '/home/index';

/* --------------- SETTINGS ------------------------- */
$route['branches'] = '/settings/branches';
$route['committees'] = '/settings/committees';
$route['newcommittee'] = '/settings/newcommittee';
$route['comitteebybranch'] = '/settings/comitteebybranch';
$route['newbranch'] = '/settings/newbranch';
$route['financial'] = '/settings/financial';
$route['rank'] = '/settings/rank';
$route['role'] = '/settings/role';


/* --------------- Agents ------------------------- */
$route['agents'] = '/agent/agents';
$route['newagent'] = '/agent/newAgent';
$route['agent/:num'] = '/agent/agentdetails/$id';
$route['employebybranch'] = '/employee/employebybranch';
$route['agentEdit/:num']	=	'/agent/agentEdit/$id';
$route['agentsCommission']   =   '/agent/aCommission/';

/* --------------- EMPLOYEE ------------------------- */
$route['employes'] = '/employee/employes';
$route['newemploye'] = '/employee/newemploye';
$route['employee/:num'] = '/employee/employeedetail/$id';
$route['employebybranch'] = '/employee/employebybranch';
$route['employeeEdit/:num']	=	'/employee/EmployeeEdit/$id';

/* --------------- CUSTOMER ------------------------- */
$route['customers'] = '/customer/customers';
$route['newcustomer'] = '/customer/newcustomer';
//$route['customer/:num'] = '/customer/customerdetail/$Customer_ID';
$route['customeredit/:num'] = '/customer/customerEdit/$id';

/* --------------- PLAN ------------------------- */
$route['plans'] = 'plans/getplans';
$route['premiumdetail'] = '/premium/detail';
$route['premiumlist'] = '/premium/premiumlist';
$route['premiumlistall'] = '/premium/premiumlistall';
//$route['printcertificate/:num'] = '/premium/printcertificate/$id';
//$route['policydetail/:num'] = '/premium/policydetail/$id';
$route['printslip/(:any)'] = '/premium/printslip/$id';
//$route['collectpremium/:num'] = '/premium/collectpremium/$id';
$route['setpremium'] = '/premium/setpremium';

/* --------------- PLAN ------------------------- */
$route['daybook'] = 'accounts/getdabook';
$route['message'] = 'smsAjax/smsPanel';

$route['expences']='accounts/expences';


$route['translate_uri_dashes'] = FALSE;
