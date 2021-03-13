<?php

namespace App\Services\Category;


use App\Models\Category;
use App\Services\Category\ICategoryService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;





class CategoryService implements ICategoryService
{

    protected $category;

    function __construct(Category $category) {
        $this->category = $category;
    }
    /**
    * get All Categorys
    *
    * @return Collection<App\Models\Category>
    */
    public function all(){
        return Category::query()->with('products')->orderby('created_at','desc')->get();
    }

    /**
    * find Category By ID
    * @param int $id
    * @return App\Models\Category
    */
    public function find($id){
        return Category::where('id',$id)->first();
    }
    /**
    * Create new Category
    *
    * @param Array $data
    * @return App\Models\Category
    */
    public function create($data){
        $category =  Category::create($data);
        return $category;
    }

    /**
    * update existing Category
    *
    * @param Array $data
    * @param App\Models\Category $category
    * @return boolean
    */
    public function update($id, $data){
        $category = $this->find($id);

        $category->update($data);

        return $category;
    }


    /**
    * delete existing Category
    *
    * @param int $id
    * @return boolean
    */
    public function delete($id){
        return Category::destroy($id);
    }

  public function getActiveCategoryServices(Request $filters)
    {

        $query = Category::query()
            ->with('products');

        return $query;
    }

}
