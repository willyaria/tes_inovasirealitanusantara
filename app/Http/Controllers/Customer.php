<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer_m;
use DB;

class Customer extends Controller
{
    function index(Request $request)
    {
        $get_datatables = Customer_m::select('customer.id', 'b.nama as customer_type', 'customer.nama', 'customer.alamat', 'customer.tanggal_lahir', 'customer.longitude', 'customer.latitude', 'customer.keterangan')
                                        ->join('m_customer_type as b', 'b.id', '=', 'customer.id_m_customer_type', 'left')
                                        ->where('customer.active', 1)        
                                        ->where('customer.trash', 0)        
                                        ->get();

        if(request()->ajax()) {
            return datatables()->of($get_datatables)
            ->addColumn('action', function($field){
                $button = '<button type="button" title="Edit" name="edit" id="'.$field->id.'" class="edit btn btn-primary btn-sm"><i class="fa fa-pencil-square"></i></button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" title="Delete" name="delete" id="'.$field->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
                $button .= '&nbsp;&nbsp;';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('vb_customer/list');
    }

    function tambah_customer(Request $request)
    {
        $customer_type = DB::table('m_customer_type')
                            ->select('id', 'nama', 'status')         
                            ->get();

        return view('vb_customer/add', compact('customer_type'));
    }

    function save_customer(Request $request)
    {
        $data1=array(
			'id_m_customer_type'	=> $request->get('ty_cus'),
			'nama'				    => $request->get('nm_cus'),
			'alamat'				=> $request->get('al_cus'),
			'tanggal_lahir'			=> $request->get('tgl_lhr'),
			'status'			    => $request->get('stat'),
			'keterangan'		    => $request->get('ket'),
		);
		Customer_m::insert($data1);
    }

    function ubah_customer(Request $request, $id)
	{
        $customer_edit = Customer_m::select('*')
                                ->where('active', 1)        
                                ->where('trash', 0)        
                                ->where('id', $id)        
                                ->get();    
        $customer_type = DB::table('m_customer_type')
                            ->select('id', 'nama', 'status')         
                            ->get();
        
        return view('vb_customer/edit',compact('customer_edit', 'customer_type'));
    }

    function update_customer(Request $request)
	{
		$idh = $request->get('id_cus');

        $data2=array(
            'id_m_customer_type'	=> $request->get('ty_cus'),
			'nama'				    => $request->get('nm_cus'),
			'alamat'				=> $request->get('al_cus'),
			'tanggal_lahir'			=> $request->get('tgl_lhr'),
			'status'			    => $request->get('stat'),
            'keterangan'		    => $request->get('ket'),
        );
        Customer_m::where('id', $idh)->update($data2);
	}

    function delete_customer($id)
	{
		$data3=array(
			'active' => 0,
			'trash' => 1
		);
		Customer_m::where('id', $id)->update($data3);
	}
}
