<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Serie;
use App\Models\ProductType;
use App\Models\Brand;



use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Models\ProductImage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $config = $this->config();
        $title = config('apps.user');
        $template = 'admin.dashboard.product.index';

        $products = Product::orderBy('id', 'DESC')->paginate(20);
        return view('admin.dashboard.layout', compact('template', 'config', 'title', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $config = $this->config();
        $title = config('apps.user');
        $template = 'admin.dashboard.product.create';
        $categories = Category::orderBy('id', 'ASC')->select('id', 'ten')->get();
        $series = Serie::orderBy('id', 'ASC')->select('id', 'ten')->get();
        $typeproducts = ProductType::orderBy('id', 'ASC')->select('id', 'ten')->get();
        $brands = Brand::orderBy('id', 'ASC')->select('id', 'ten')->get();

        //$products = Product::orderBy('id','DESC')->paginate(20);
        return view('admin.dashboard.layout', compact('template', 'config', 'title', 'categories', 'series', 'typeproducts', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $image_name = $request->image->hashName();
        $request->image->move(public_path('uploads/images'), $image_name);
         $dataInput = [
            'ten' => $request->input('name'),
            'cate_id' => $request->input('category'),
            'brand_id' => $request->input('brand'),
            'serie_id' => $request->input('serie'),
            'type_id' => $request->input('type'),
            'price' => $request->input('price'),
            'status' => $request->input('product_status')
        ];
        $dataInput['image'] = $image_name;

        if ($product = Product::create($dataInput)) {
            // dd($request->has('other_image'));
            if ($request->has('other_image')) {
                   
                foreach ($request->other_image as $img) {
                    $img_name = $img->hashName();
                    //dd($img_name);
                    $img->move(public_path('uploads/images'), $img_name);         
                    $imagedata = [
                        'image' => $img_name,
                        'product_id' => $product->id
                    ];  
                    ($imagedata);
                    ProductImage::create($imagedata);
                }
            }

            return redirect()->route('product.index')->with('success', 'Tạo sản phẩm thành công');
        }
        return redirect()->back()->with('error', 'Có lỗi xảy ra');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $config = $this->config();
        $title = config('apps.user');
        $template = 'admin.dashboard.product.edit';
        $categories = Category::orderBy('id', 'ASC')->select('id', 'ten')->get();
        $series = Serie::orderBy('id', 'ASC')->select('id', 'ten')->get();
        $typeproducts = ProductType::orderBy('id', 'ASC')->select('id', 'ten')->get();
        $brands = Brand::orderBy('id', 'ASC')->select('id', 'ten')->get();
        return view('admin.dashboard.layout', compact('template', 'config', 'title', 'categories', 'series', 'typeproducts', 'brands', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $dataInput = [
            'ten' => $request->input('name'),
            'cate_id' => $request->input('category'),
            'brand_id' => $request->input('brand'),
            'serie_id' => $request->input('serie'),
            'type_id' => $request->input('type'),
            'price' => $request->input('price'),
            'status' => $request->input('product_status')
        ];
        if ($request->has('img')) {
            $imageName = $product->image;
            $image_path = public_path('uploads/images').'/'.$imageName;
            if(file_exists($image_path)){
                unlink($image_path);
            }
            $image_name = $request->image->hashName();
            $request->image->move(public_path('uploads/images'), $image_name);
            $dataInput['image'] = $image_name;
        }

        if (Product::where('id', $product->id)->update($dataInput)) {

            if ($request->has('other_image')) {

                if($product->images->count() >0){
                    foreach($product->images as $image){
                        $detail_image_name = $image->image;
                        $detail_image_path = public_path('uploads/images').'/'.$detail_image_name;
                        if(file_exists($detail_image_path)){
                            unlink($detail_image_path);
                        }       
                    }
                    ProductImage::where('product_id',$product->id)->delete();
                }
                
                foreach ($request->other_image as $img) {
                    $img_name = $img->hashName();
                    //dd($img_name);
                    $img->move(public_path('uploads/images'), $img_name);         
                    $imagedata = [
                        'image' => $img_name,
                        'product_id' => $product->id
                    ];  
                    ($imagedata);
                    ProductImage::create($imagedata);
                }
            }

            return redirect()->route('product.index')->with('success', 'Chỉnh sửa sản phẩm thành công');
        }
        return redirect()->back()->with('error', 'Có lỗi xảy ra');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //lay anh dai dien
        $imageName = $product->image;
        $image_path = public_path('uploads/images').'/'.$imageName;

        if($product->images->count() >0){
            foreach($product->images as $image){
                $detail_image_name = $image->image;
                $detail_image_path = public_path('uploads/images').'/'.$detail_image_name;
                if(file_exists($detail_image_path)){
                    unlink($detail_image_path);
                }
                
            }
            ProductImage::where('product_id',$product->id)->delete();
            
            if($product->delete()){
                if(file_exists($image_path)){
                    unlink($image_path);
                }
                return redirect()->route('product.index')->with('success','Xóa sản phẩm thành công');
            }

        }
        else{
            if($product->delete()){
                if(file_exists($image_path)){
                    unlink($image_path);
                }
                return redirect()->route('product.index')->with('success','Xóa sản phẩm thành công');
            }
            
        }
        return redirect()->route('product.index')->with('error','Có lỗi xảy ra, xóa thất bại');
        // $imageName = $product->image;
        // $image_path = public_path('uploads/images').'/'.$imageName;
        // if($product->delete()){
        //     if(file_exists($image_path)){
        //         unlink($image_path);
        //     }
        //     return redirect()->route('product.index')->with('success','Xóa sản phẩm thành công');
        // }
        // return redirect()->route('product.index')->with('error','Có lỗi xảy ra, xóa thất bại');
        
    }
    


    public function deleteImage(ProductImage $image)
    {
        $imageName = $image->image;
        if($image->delete()){
            $imagePath = public_path('uploads/images').'/'.$imageName;
            if(file_exists($imagePath)){
                unlink($imagePath);
            }
            return redirect()->back()->with('success','Xóa ảnh thành công');
        }
        return redirect()->back()->with('error','Có lỗi xảy ra, xóa thất bại');


    }


    public function config()
    {
        return [
            'js' => [
                'backend/js/plugins/flot/jquery.flot.js',
                'backend/js/plugins/flot/jquery.flot.tooltip.min.js',
                'backend/js/plugins/flot/jquery.flot.spline.js',
                'backend/js/plugins/flot/jquery.flot.resize.js',
                'backend/js/plugins/flot/jquery.flot.pie.js',
                'backend/js/plugins/flot/jquery.flot.symbol.js',
                'backend/js/plugins/flot/jquery.flot.time.js',
                'backend/js/plugins/peity/jquery.peity.min.js',
                'backend/js/demo/peity-demo.js',
                'backend/js/inspinia.js',
                'backend/js/plugins/pace/pace.min.js',
                'backend/js/plugins/jquery-ui/jquery-ui.min.js',
                'backend/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js',
                'backend/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
                'backend/js/plugins/easypiechart/jquery.easypiechart.js',
                'backend/js/plugins/sparkline/jquery.sparkline.min.js',
                'backend/js/demo/sparkline-demo.js',

            ]
        ];
    }
}
