<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use EllipseSynergie\ApiResponse\Contracts\Response;
use App\SecondaryInventory;
use App\Transformer\SecondaryInventoryTransformer;
 
class SecondaryInventoryViewController extends Controller
{
    protected $response;
 
    public function __construct(Response $response)
    {
        $this->response = $response;
    }
 
    public function index()
    {
        //Get all task
        return view('SecondaryInventory.index',['inventories' => SecondaryInventory::all()]);


    }
 
    public function show($id)
    {
        //Get the task
        $inventory = SecondaryInventory::find($id);
        return view('SecondaryInventory.show',['inventory' => $inventory]);

    }
 
    public function destroy($id)
    {
        //Get the task
        $inventory = SecondaryInventory::find($id);
        if (!$inventory) {
            return $this->response->errorNotFound('Inventory Not Found');
        }
 
        if($inventory->delete()) {
             return $this->response->withItem($inventory, new  SecondaryInventoryTransformer());
        } else {
            return $this->response->errorInternalError('Could not delete an inventory');
        }
 
    }
 
    public function store(Request $request)  {
        if ($request->isMethod('put')) {
            //Get the task
            $inventory = SecondaryInventory::find($request->id);
            if (!$inventory) {
                return $this->response->errorNotFound('Inventory Not Found');
            }
        } else {
            $inventory = new SecondaryInventory;
        }
                $inventory->userId =  $request->input('userId'); //$request->user()->id;

        $inventory->tank_ammo = $request->input('ammo');
 
        if($inventory->save()) {
            return $this->response->withItem($inventory, new  SecondaryInventoryTransformer());
        } else {
             return $this->response->errorInternalError('Could not update/create an inventory');
        }
 
    }
 
}
