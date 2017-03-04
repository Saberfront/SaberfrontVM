<?php
 
namespace Saberfront\Http\Controllers;
 
use Illuminate\Http\Request;
use Saberfront\Http\Requests;

use Illuminate\Support\Facades\Auth;
use EllipseSynergie\ApiResponse\Contracts\Response;
use Saberfront\SecondaryInventory;
use Saberfront\Transformer\SecondaryInventoryTransformer;
 
class SecondaryInventoryController extends Controller
{
    protected $response;
 
    public function __construct(Response $response)
    {
        $this->response = $response;
    }
 
    public function index()
    {
        //Get all task

        $inventory = SecondaryInventory::paginate(15);
        // Return a collection of $task with pagination
        return $this->response->withPaginator($inventory, new  SecondaryInventoryTransformer());

    }
 
    public function show($id)
    {
        //Get the task
        $inventory = SecondaryInventory::find($id);
        if (!$inventory) {
            return $this->response->errorNotFound('Inventory Not Found');
        }
        // Return a single task
        return $this->response->withItem($inventory, new  SecondaryInventoryTransformer());
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
        
            //Get the task
            $inventory = SecondaryInventory::find($request->id);
            if (!$inventory) {
                return $this->response->errorNotFound('Inventory Not Found');
            }
        
           $inventory->userId =  $request->input('userId'); //$request->user()->id;

        $inventory->tank_ammo = $request->input('ammo');
 
        if($inventory->save()) {
            return $this->response->withItem($inventory, new  SecondaryInventoryTransformer());
        } else {
             return $this->response->errorInternalError('Could not update an inventory');
        }
 
    }
 
}
