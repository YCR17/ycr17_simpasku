<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Library\Api\ApiRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class PasienController extends Controller
{
    //
    private $base_url = 'https://mockapi.pkuwsb.id/api';
    private $x_username = 'admin';
    private $x_password = 'secret';
    public function index(Request $request)
    {

        // Ambil parameter dari request
        $params = [
            'page' => 1,
            'perPage' => 5,
            'search' => $request->input('search'),
            'gender' => $request->input('gender'),
            'ethnic' => $request->input('ethnic'),
            'education' => $request->input('education'),
            'married_status' => $request->input('married_status'),
            'job' => $request->input('job'),
            'blood_type' => $request->input('blood_type'),
        ];


        if ($request->filled('xurl')) {
            $xurl = $request->input('xurl');
            $xurl = urldecode($xurl);
            $query = parse_url($xurl, PHP_URL_QUERY);
            parse_str($query, $array);

            if (isset($array['page'])) {
                $params['page'] = $array['page'];
            }

        }


        // Hapus null agar query bersih
        $params = array_filter($params, fn($value) => !is_null($value));

        // Request ke API eksternal
        $response = Http::withHeaders([
            'X-username' => $this->x_username,
            'X-password' => $this->x_password,
        ])->get("{$this->base_url}/patient", $params);

        if ($response->failed()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal mengambil data pasien',
                // 'error' => $response->json()
                'error' => 'Mohon maaf, saat ini server tidak bisa terhubung dengan data'
            ], $response->status());
        }

        return response()->json([
            'status' => true,
            'data' => $response->object()->data,
        ]);
    }

    public function detail(Request $request, $id)
    {
        // Request ke API eksternal
        $response = Http::withHeaders([
            'X-username' => $this->x_username,
            'X-password' => $this->x_password,
        ])->get("{$this->base_url}/patient/$id");

        if ($response->failed()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal mengambil data pasien',
                'error' => $response->json()
            ], $response->status());
        }

        return response()->json([
            'status' => true,
            'data' => $response->object()->data,
        ]);
    }

    public function edit(Request $request, $id)
    {
        $data = $request->except('_token');

        // Request ke API eksternal
        $response = Http::withHeaders([
            'X-username' => $this->x_username,
            'X-password' => $this->x_password,
        ])->put("$this->base_url/patient/$id", $data);

        if ($response->failed()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal mengambil data pasien',
                'error' => $response->json()
            ], $response->status());
        }

        return response()->json([
            'status' => true,
            'data' => $response->object()->data,
            'd' => $data
        ]);
    }

    public function delete(Request $request, $id)
    {
        if (!isset($id)) {
            return response()->json([
                'status' => false,
                'message' => 'Id tidak boleh kosong',
                'error' => 'Id nulled'
            ], 406);
        }

        $response = Http::withHeaders([
            'X-username' => $this->x_username,
            'X-password' => $this->x_password,
        ])->delete("$this->base_url/patient/$id");

        if ($response->failed()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus data pasien',
                'error' => $response->json()
            ], $response->status());
        }

        return response()->json([
            'status' => true,
            'data' => $response->body(),
        ]);

    }

    public function create(Request $request)
    {
        $data = collect($request->except('_token', 'ethnic'));

        $length = 6;
        $base = str_replace('.', '', microtime(true));
        // Tambah random biar makin variatif
        $random = mt_rand(1000, 9999);
        // Gabungkan lalu ambil sebanyak $length digit terakhir
        $id = substr($base . $random, -$length);
        $data->put('rm_number', $id);


        // Request ke API eksternal
        $response = Http::withHeaders([
            'X-username' => $this->x_username,
            'X-password' => $this->x_password,
        ])->post("$this->base_url/patient", $data);

        if ($response->failed()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal mengambil data pasien',
                'error' => $response->json()
            ], $response->status());
        }

        return response()->json([
            'status' => true,
            'data' => $response->object(),
            'd' => $data
        ]);
    }
}
