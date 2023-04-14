<?php

class Karyawan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if ($this->login_m->isNotLogin()) redirect('login');

    if (!$this->utils->isPermAllowed($_SESSION['perm']->karyawanRead ?? '')) {
      redirect('dashboard');
    }
  }


  public function index()
  {
    $x['title'] = "Karyawan";
    $data['karyawan'] = $this->m_karyawan->getAll();
    $data['department'] = $this->m_department->getOptions();
    $data['section'] = $this->m_section->getOptions();
    $data['jabatan'] = $this->m_jabatan->getOptions();
    $this->load->view('templates/header', $x);
    $this->load->view('templates/sidebar');
    $this->load->view('karyawan', $data);
    $this->load->view('templates/footer');
  }

  public function requestAll()
  {
    $data = $this->m_karyawan->getAll();
    if (!$data)
      $data = [];

    echo json_encode($data);
  }

  public function gantifoto($uid)
  {
    $post = $this->input->post();
    $post['uid'] = $uid;

    $add = $this->m_karyawan->changePhoto($post);
    if ($add['success']) {
      if ($_SESSION['user']->uid == $uid)
        $_SESSION['user']->foto = $add['foto'];

      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             Foto Berhasil Diubah!
            </div>');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             Foto Gagal Diubah!
            </div>');
    }
    redirect('karyawan/detail/' . $uid);
  }

  public function add()
  {
    if (!$this->utils->isPermAllowed($_SESSION['perm']->karyawanCreate ?? '')) {
      redirect('dashboard');
      return;
    }

    $post = $this->input->post();
    echo "<script>console.log('POST Objects: " . $post . "' );</script>";
    $add = $this->m_karyawan->add($post);
    echo "<script>console.log('" . $add . "' );</script>";
    if ($add) {
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           Data Berhasil Ditambahkan!
          </div>');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           Data Gagal Ditambahkan!
          </div>');
    }
    redirect('karyawan');
  }

  public function delete($uid)
  {
    if (!$this->utils->isPermAllowed($_SESSION['perm']->karyawanDelete ?? '')) {
      redirect('dashboard');
      return;
    }

    $delete = $this->m_karyawan->delete($uid);
    if ($delete) {
      $this->session->set_flashdata('message', '
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                Data Berhasil Dihapus!
            </div>');
    } else {
      $this->session->set_flashdata('message', '
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                Data Gagal Dihapus!
            </div>');
    }
    redirect('karyawan');
  }

  public function edit($uid)
  {
    if (!$this->utils->isPermAllowed($_SESSION['perm']->karyawanUpdate ?? '')) {
      redirect('dashboard');
      return;
    }
    $x['title'] = "Edit Data Karyawan";
    $data['karyawan'] = $this->m_karyawan->getById($uid);
    $data['department'] = $this->m_department->getOptions();
    $data['section'] = $this->m_section->getOptions();
    $data['jabatan'] = $this->m_jabatan->getOptions();
    $this->load->view('templates/header', $x);
    $this->load->view('templates/sidebar');
    $this->load->view('edit', $data);
    $this->load->view('templates/footer');
  }

  public function update()
  {
    if (!$this->utils->isPermAllowed($_SESSION['perm']->karyawanUpdate ?? '')) {
      redirect('dashboard');
      return;
    }

    $post = $this->input->post();
    $update = $this->m_karyawan->update($post);

    if ($update) {
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           Data Berhasil Diupdate!
          </div>');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           Data Gagal Diupdate!
          </div>');
    }

    redirect('karyawan');
  }

  public function detail($uid)
  {
    // $this->load->model('m_karyawan');
    // $detail = $this->m_karyawan->detail_data($npk);
    // $data['detail'] = $detail;
    $x['title'] = "Detail Data Karyawan";
    $data['detail'] = $this->m_karyawan->getById($uid);
    $data['kontrak'] = $this->m_kontrak->getById($uid);
    $data['promosi'] = $this->m_promosi->getById($uid);
    $data['keluarga'] = $this->m_keluarga->getById($uid);
    $data['pendidikan'] = $this->m_pendidikan->getById($uid);
    $data['pengalaman'] = $this->m_pengalaman->getById($uid);
    $data['kontak'] = $this->m_kontak->getById($uid);
    $data['training'] = $this->m_training->getById($uid);
    $data['penilaian'] = $this->m_penilaian->getById($uid);
    $data['peringatan'] = $this->m_peringatan->getById($uid);
    $data['bank'] = $this->m_bank->getById($uid);
    $this->load->view('templates/header', $x);
    $this->load->view('templates/sidebar');
    $this->load->view('detail', $data);
    $this->load->view('templates/footer');
  }

  /* public function print()
  {
    $data['karyawan'] = $this->m_karyawan->getAll();
    $this->load->view('print_karyawan', $data);
  } */

  public function print_detail($uid)
  {
    $data['detail'] = $this->m_karyawan->getById($uid);
    $data['peringatan'] = $this->m_peringatan->getById($uid);
    $this->load->view('print_detail', $data);
  }

  public function excel()
  {
    $data['karyawan'] = $this->m_karyawan->getAll();
    require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
    require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');
    $object = new PHPExcel();

    $object->getProperties()->setCreator("Adi");
    $object->getProperties()->setLastModifiedBy("Adi");
    $object->getProperties()->setTitle("Daftar Data Karyawan");

    $object->setActiveSheetIndex(0);

    $object->getActiveSheet()->setCellValue('A2', 'NO');
    $object->getActiveSheet()->setCellValue('B2', 'NPK');
    $object->getActiveSheet()->setCellValue('C2', 'No KTP');
    $object->getActiveSheet()->setCellValue('D2', 'NAMA KARYAWAN');
    $object->getActiveSheet()->setCellValue('E2', 'DEPARTEMEN');
    $object->getActiveSheet()->setCellValue('F2', 'SECTION');
    $object->getActiveSheet()->setCellValue('G2', 'JABATAN');
    $object->getActiveSheet()->setCellValue('H2', 'ALAMAT');
    $object->getActiveSheet()->setCellValue('I2', 'ALAMAT DOMISILI');
    $object->getActiveSheet()->setCellValue('J2', 'STATUS NIKAH');
    $object->getActiveSheet()->setCellValue('K2', 'STATUS KARYAWAN');
    $object->getActiveSheet()->setCellValue('L2', 'JENIS KELAMIN');
    $object->getActiveSheet()->setCellValue('M2', 'No TELEPON');
    $object->getActiveSheet()->setCellValue('N2', 'TEMPAT LAHIR');
    $object->getActiveSheet()->setCellValue('O2', 'TANGGAL LAHIR');
    $object->getActiveSheet()->setCellValue('P2', 'EMAIL');
    $object->getActiveSheet()->setCellValue('Q2', 'No NPWP');
    $object->getActiveSheet()->setCellValue('R2', 'KEBANGSAAN');
    $object->getActiveSheet()->setCellValue('S2', 'AGAMA');
    $object->getActiveSheet()->setCellValue('T2', 'JUMLAH ANAK');
    $object->getActiveSheet()->setCellValue('U2', 'GOLONGAN DARAH');
    $object->getActiveSheet()->setCellValue('V2', 'BPJS KESEHATAN');
    $object->getActiveSheet()->setCellValue('W2', 'BPJS KETENAGAKERJAAN');

    $baris = 3;
    $no = 1;

    foreach ($data['karyawan'] as $kry) {
      $status_kerja = "";
      switch ($kry->status_kerja) {
        case 1:
          $status_kerja = "Aktif";
          break;
        case 2:
          $status_kerja = "PHK";
          break;
        case 3:
          $status_kerja = "Resign";
          break;
        case 4:
          $status_kerja = "Habis Kontrak";
          break;
        case 5:
          $status_kerja = "Meninggal";
          break;
        case 6:
          $status_kerja = "Lainnya";
          break;
      }
      $object->getActiveSheet()->setCellValue('A' . $baris, $no++);
      $object->getActiveSheet()->setCellvalue('B' . $baris, $kry->npk);
      $object->getActiveSheet()->setCellvalue('C' . $baris, $kry->nik);
      $object->getActiveSheet()->setCellvalue('D' . $baris, $kry->nama);
      $object->getActiveSheet()->setCellvalue('E' . $baris, $kry->department);
      $object->getActiveSheet()->setCellvalue('F' . $baris, $kry->section);
      $object->getActiveSheet()->setCellvalue('G' . $baris, $kry->jabatan);
      $object->getActiveSheet()->setCellvalue('H' . $baris, $kry->alamat);
      $object->getActiveSheet()->setCellvalue('I' . $baris, $kry->alamat_domisili);
      $object->getActiveSheet()->setCellvalue('J' . $baris, $kry->status_nikah);
      $object->getActiveSheet()->setCellvalue('K' . $baris, $status_kerja);
      $object->getActiveSheet()->setCellvalue('L' . $baris, $kry->jkel);
      $object->getActiveSheet()->setCellvalue('M' . $baris, $kry->tlp);
      $object->getActiveSheet()->setCellvalue('N' . $baris, $kry->tempat_lahir);
      $object->getActiveSheet()->setCellvalue('O' . $baris, $kry->tanggal_lahir);
      $object->getActiveSheet()->setCellvalue('P' . $baris, $kry->email);
      $object->getActiveSheet()->setCellvalue('Q' . $baris, $kry->npwp);
      $object->getActiveSheet()->setCellvalue('R' . $baris, $kry->kebangsaan);
      $object->getActiveSheet()->setCellvalue('S' . $baris, $kry->agama);
      $object->getActiveSheet()->setCellvalue('T' . $baris, $kry->jumlah_anak);
      $object->getActiveSheet()->setCellvalue('U' . $baris, $kry->golongan_darah);
      $object->getActiveSheet()->setCellvalue('V' . $baris, $kry->bpjs_kes);
      $object->getActiveSheet()->setCellvalue('W' . $baris, $kry->bpjs_tk);

      $baris++;
    }

    $filename = "Data Karyawan" . date('d-m-Y') . '.xlsx';

    $object->getActiveSheet()->setTitle("Daftar Data Karyawan");

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheethtml.sheet');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');

    $writer = PHPExcel_IOFactory::createwriter($object, 'Excel2007');
    ob_end_clean();
    $writer->save('php://output');

    exit;
  }

  public function search()
  {
    $keyword = $this->input->post('keyword');
    $data['karyawan'] = $this->m_karyawan->get_keyword($keyword);
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('karyawan', $data);
    $this->load->view('templates/footer');
  }
}
