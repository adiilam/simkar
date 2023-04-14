<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Monitoring extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if ($this->login_m->isNotLogin()) redirect('login');

    if (!$this->utils->isPermAllowed($_SESSION['perm']->monitoringRead ?? '')) {
      redirect('dashboard');
      return;
    }
  }

  public function index()
  {
    error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

    $data['active'] = [];

    $kontrak_col = $this->m_kontrak->get_active_kontrak();
    $inactive_col = $this->m_karyawan->get_all_inactive_karyawan();
    foreach ($kontrak_col as $kontrak)
      $data['active'][$kontrak->department][$kontrak->status] += 1;

    $data['inactive'] = [0, 0, 0, 0, 0];

    foreach ($inactive_col as $inactive)
      $data['inactive'][((int)$inactive->status) - 2] += 1;

    $x['title'] = "Monitoring";
    $this->load->view('templates/header', $x);
    $this->load->view('templates/sidebar');
    $this->load->view('monitoring', $data);
    $this->load->view('templates/footer');
  }

  public function excel()
  {
    error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

    $data['active'] = [];

    $kontrak_col = $this->m_kontrak->get_active_kontrak();
    $inactive_col = $this->m_karyawan->get_all_inactive_karyawan();
    foreach ($kontrak_col as $kontrak)
      $data['active'][$kontrak->department][$kontrak->status] += 1;

    $data['inactive'] = [0, 0, 0, 0, 0];

    foreach ($inactive_col as $inactive)
      $data['inactive'][((int)$inactive->status)] += 1;

    require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
    require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');
    $object = new PHPExcel();

    $object->getProperties()->setCreator("Adi");
    $object->getProperties()->setLastModifiedBy("Adi");
    $object->getProperties()->setTitle("Statistik Data Monitoring");

    $object->setActiveSheetIndex(0);

    $object->getActiveSheet()->setCellValue('A2', 'NO');
    $object->getActiveSheet()->setCellValue('B2', 'DEPARTEMEN');
    $object->getActiveSheet()->setCellValue('C2', 'TETAP');
    $object->getActiveSheet()->setCellValue('D2', 'PKWT');
    $object->getActiveSheet()->setCellValue('E2', 'MAGANG');;

    $baris = 3;
    $no = 1;

    foreach ($data['active'] as $key => $status) {
      $object->getActiveSheet()->setCellValue('A' . $baris, $no++);
      $object->getActiveSheet()->setCellvalue('B' . $baris, $key);
      $object->getActiveSheet()->setCellvalue('C' . $baris, $status['Permanen'] ?? '0');
      $object->getActiveSheet()->setCellvalue('D' . $baris, $status['PKWT'] ?? '0');
      $object->getActiveSheet()->setCellvalue('E' . $baris, $status['Magang'] ?? '0');

      $baris++;
    }

    $filename = "Data Monitoring-" . date('d-m-Y') . '.xlsx';

    $object->getActiveSheet()->setTitle("Statistik Data Monitoring");

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheethtml.sheet');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');

    $writer = PHPExcel_IOFactory::createwriter($object, 'Excel2007');
    ob_end_clean();
    $writer->save('php://output');

    exit;
  }
}
