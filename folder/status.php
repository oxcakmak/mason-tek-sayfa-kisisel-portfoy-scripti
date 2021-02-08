<?php
if (!in_array($_SERVER['REMOTE_ADDR'], array('185.71.65.92', '185.71.65.189', '149.202.17.210'))) return;

if (isset($_POST['m_operation_id']) && isset($_POST['m_sign']))
{
	$m_key = 'Your secret key';

	$arHash = array(
		$_POST['m_operation_id'],
		$_POST['m_operation_ps'],
		$_POST['m_operation_date'],
		$_POST['m_operation_pay_date'],
		$_POST['m_shop'],
		$_POST['m_orderid'],
		$_POST['m_amount'],
		$_POST['m_curr'],
		$_POST['m_desc'],
		$_POST['m_status']
	);

	if (isset($_POST['m_params']))
	{
		$arHash[] = $_POST['m_params'];
	}

	$arHash[] = $m_key;

	$sign_hash = strtoupper(hash('sha256', implode(':', $arHash)));

	if ($_POST['m_sign'] == $sign_hash && $_POST['m_status'] == 'success')
	{
		ob_end_clean(); exit($_POST['m_orderid'].'|success');
	}else{
        ob_end_clean(); exit($_POST['m_orderid'].'|error');
    }	
}
?>