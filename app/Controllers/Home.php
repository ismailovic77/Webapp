<?php

namespace App\Controllers;

use App\Models\ImageModel;
use App\Models\PatientModel;
use CodeIgniter\I18n\Time;
use CodeIgniter\Config\Services as CoreServices;


class Home extends BaseController
{
    protected $helpers = ['form', 'filesystem', 'url'];
    protected $db;
    protected $patientModel;
    protected $imageModel;
    protected $ApiUrl;

    public function __construct()
    {
        $this->db           = \Config\Database::connect();
        $this->patientModel = new PatientModel;
        $this->imageModel   = new ImageModel;
        $this->ApiUrl   = "http://52.158.42.242:3000/";
    }

    public function testUpload_server()
    {
        $files = $this->request->getFiles();
        dd($files["userfile"]->move("assets/images/patients", "API-" . $files["userfile"]->getName()));
    }
    public function index()
    {
        echo view('layouts/header');
        echo view('pages/home');
        echo view('layouts/footer');
    }

    public function get_data_patients()
    {
        $builder      = $this->make_query();
        $query        = $builder->get();
        $query_result = $query->getResult();
        $data         = array();
        foreach ($query_result as $row) {
            $sub_array   = array();
            $sub_array[] = $row->first_name;
            $sub_array[] = $row->last_name;
            $sub_array[] = $row->birth_date;
            $sub_array[] = $row->email;
            $sub_array[] = $row->phone;
            $sub_array[] = $row->last_menstrual_period;
            $sub_array[] = $row->gestational_age;
            $sub_array[] = $row->gravidity;
            $sub_array[] = $row->parity;
            $sub_array[] = $row->medical_history;
            $sub_array[] = $row->notes;
            $sub_array[] = '
			<div class="button-items text-center">
				<a href="' . base_url("patients/$row->patient_id") . '">
				<button type="button" class="show btn btn-primary waves-effect waves-light btn-sm">
					<i class="fa fa-eye"></i>
				</button>
				</a>
				<button type="button" data-id="' . $row->patient_id . '" class="update btn btn-warning waves-effect waves-light btn-sm">
					<i class="fa fa-edit"></i>
				</button>
				<button type="button" data-id="' . $row->patient_id . '" class="delete btn btn-danger waves-effect waves-light btn-sm">
					<i class="fa fa-trash"></i>
				</button>
			</div>';
            $data[] = $sub_array;
        }
        $output = array(
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function make_query()
    {
        $builder = $this->db->table('patients');
        $builder->select('*, patients.id  as patient_id');
        $builder->where('patients.admin_id', session('id'));
        $builder->join('admins', 'admins.id = patients.admin_id');
        return $builder;
    }

    public function store()
    {
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'first_name' => 'required',
                'last_name' => 'required',
            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                echo json_encode($this->request->getVar('first_name'));
            } else {

                $data = [
                    'first_name' => $this->request->getVar('first_name'),
                    'last_name' => $this->request->getVar('last_name'),
                    'birth_date' => $this->request->getVar('birth_date'),
                    'email' => $this->request->getVar('email'),
                    'phone' => $this->request->getVar('phone'),
                    'last_menstrual_period' => $this->request->getVar('last_menstrual_period'),
                    'gestational_age' => $this->request->getVar('gestational_age'),
                    'gravidity' => $this->request->getVar('gravidity'),
                    'parity' => $this->request->getVar('parity'),
                    'medical_history' => $this->request->getVar('medical_history'),
                    'notes' => $this->request->getVar('notes'),
                    'admin_id'    => session('id'),
                ];

                $this->patientModel->save($data);

                echo json_encode(true);
            }
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {
            $patientModel = new PatientModel;
            $patient_id   = $this->request->getVar("patient_id");
            // fetch patient_id with admin_id
            $patient = $this->patientModel->where(['id' => $patient_id, 'admin_id' => session('id')])->first();
            if ($patient) {
                $data = [
                    'first_name' => $this->request->getVar("first_name"),
                    'last_name' => $this->request->getVar("last_name"),
                    'birth_date' => $this->request->getVar("birth_date"),
                    'email' => $this->request->getVar("email"),
                    'phone' => $this->request->getVar("phone"),
                    'last_menstrual_period' => $this->request->getVar("last_menstrual_period"),
                    'gestational_age' => $this->request->getVar("gestational_age"),
                    'gravidity' => $this->request->getVar("gravidity"),
                    'parity' => $this->request->getVar("parity"),
                    'medical_history' => $this->request->getVar("medical_history"),
                    'notes' => $this->request->getVar("notes"),
                ];
                echo json_encode($patientModel->update($patient_id, $data));
            }
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {
            $patient_id = $this->request->getVar("patient_id");
            $project    = $this->patientModel->where(['id' => $patient_id, 'admin_id' => session('id')])->first();
            if ($project) {
                $this->patientModel->delete(['id', $patient_id]);
                echo json_encode(['status' => '200']);
            }
        }
    }

    public function show($patient_id)
    {
        $patient = $this->patientModel->where(['id' => $patient_id, 'admin_id' => session('id')])->first();
        if (!$patient) {
            return redirect("/");
        }

        $images = $this->imageModel->asObject()->where('patient_id', $patient_id)->findAll();

        echo view('layouts/header');
        echo view('pages/patient_show', compact('patient', 'images'));
        echo view('layouts/footer');
    }

    public function add_image($patient_id)
    {
        $files = $this->request->getFiles();
        $patient = $this->patientModel->where(['id' => $patient_id, 'admin_id' => session('id')])->first();
        if ($files && $patient) {
            //$uploadPath = 'assets/images/patients';
            $uploadPath = 'webapp_storage/'.session('id')."/".$patient_id;
            foreach ($files['file'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $file->move($uploadPath, $file->getName());
                    $this->imageModel->save([
                        'path' =>  $uploadPath . '/' . $file->getName(),
                        'patient_id'  => $patient["id"]
                    ]);
                }
                echo json_encode(['status' => '202']);
            }
        }
        return redirect()->back();
    }

    public function delete_image()
    {
        if ($this->request->isAJAX()) {
            $image_id = $this->request->getVar("image_id");
            $image   = (object) $this->imageModel->where(['id' => $image_id])->first();
            $project = (object) $this->patientModel->find(["id" => $image->patient_id, 'admin_id' => session('id')]);
            if ($image && $project) {
                $this->imageModel->delete(['id', $image_id]);
                unlink($image->path);
                echo json_encode(['status' => '200']);
            } else {
                echo json_encode(['status' => '404']);
            }
        }
    }

    private function run_classification($images,$patient_id)
    {        
        $client = new CoreServices;
        $paths = [];
        foreach ($images as $image) {
            $this->analyticsIncrimentor("tt_img_processed");
            //$paths[$image->id] = FCPATH . $image->path;
            array_push($paths,FCPATH . $image->path);
            //new \CURLFile(FCPATH . $image->path);
        }
        $data = $client::curlrequest()->request(
            "POST",
            $this->ApiUrl . "/",
            [
                'form_params' => [
                    'paths' => json_encode($paths),
                    'patient_id' => $patient_id,
                    'admin_id' => session('id') ,
                ]
            ]
        );
        return json_decode($data->getBody());
    }

    public function classification($patient_id)
    {
        $patient = $this->patientModel->where(['id' => $patient_id, 'admin_id' => session('id')])->first();
        if (!$patient) {
            return redirect("/");
        }

        $images = $this->imageModel->asObject()->where('patient_id', $patient_id)->findAll();
        try {
            $clasification = $this->run_classification($images, $patient_id);
        } catch (\Throwable $th) {
            $clasification = (object)[
                // "server_error" => $th->getMessage(),
                "abdominal" => [],
                "femoral" => [],
                "thranstalamique" => []
            ];
        }
        // dd($clasification);
        echo view('layouts/header');
        echo view('pages/patient_classification', compact('patient', 'images', 'clasification'));
        echo view('layouts/footer');
    }

    private function run_segmentation($path,$patient_id)
    {
        $client = new CoreServices;
        $data = $client::curlrequest()->request(
            "POST",
            $this->ApiUrl . "predict/segmentation",
            [
                'form_params' => [
                    'path' => $path,
                    'patient_id' => $patient_id,
                    'admin_id' => session('id') ,
                ]
            ]
        );
        return json_decode($data->getBody());
    }
    public function segmentation($patient_id)
    {
        $images_folder = 'webapp_storage/'.session('id')."/".$patient_id."/";
        $image_path = $images_folder . $this->request->getVar('image');
        $the_plan = $this->request->getVar('plan');
        $patient = $this->patientModel->where(['id' => $patient_id, 'admin_id' => session('id')])->first();
        if (!$patient) return redirect("/");

        // function save_image($inPath, $outPath)
        // {
        //     //Download images from remote server
        //     $in =    fopen($inPath, "rb");
        //     $out =   fopen($outPath, "wb");
        //     while ($chunk = fread($in, 8192)) {
        //         fwrite($out, $chunk, 8192);
        //     }
        //     fclose($in);
        //     fclose($out);
        // }
        $result = $this->run_segmentation($image_path,$patient_id);

        //$output_folder = "assets/images/patients/segmentations/" . $result->image;
        // /$output_folder = "assets/images/patients/segmentations/" . $result->image;
        #save_image($this->ApiUrl .  "static/segmentation_output/" . $result->image, FCPATH . $output_folder);

        // $images = $this->imageModel->asObject()->where('patient_id', $patient_id)->findAll();

		return $this->response->setJSON($result);

        // echo view('layouts/header');
        // echo view('pages/patient_segmentation', compact('patient', 'result', 'the_plan'));
        // echo view('layouts/footer');
    }

    public function rciu_check()
    {
        $client = new CoreServices;
        $data = $client::curlrequest()->request(
            "POST",
            $this->ApiUrl . "predict/rciu",
            [
                'form_params' => [
                    'GA' => $this->request->getJSON()->GA,
                    'LF' => $this->request->getJSON()->LF,
                    'AC' => $this->request->getJSON()->AC,
                    'HC' => $this->request->getJSON()->HC
                ]
            ]
        );
        return $this->response->setJSON($data->getBody());
    }
    public function analytics()
    {
        echo view('layouts/header');
        echo view('pages/admin/analytics');
        echo view('layouts/footer');
    }
    public function reports()
    {
        echo view('layouts/header');
        echo view('pages/admin/reports');
        echo view('layouts/footer');
    }
    public function literature()
    {
        echo view('layouts/header');
        echo view('pages/admin/literature');
        echo view('layouts/footer');
    }
}
