<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::paginate(10);
        return view("Product.index", compact("data"));
    }
    public function create()
    {
        $data = Product::all();
        return view("Product.create", compact("data"));
    }

    public function store(Request $request)
    {
        // Validate dữ liệu
        $validatedData = $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' =>  'image|mimes:jpg,jpeg,png,gif|max:2048',
            'category_name' => 'required|in:romantic,detective,comedy',
        ], [
            'product_name.required' => 'Vui lòng chọn tên.',
            'description.required' => 'Vui lòng nhập số lượng.',
            'price.integer' => 'Số lượng phải là số nguyên.',
            'image.image' => 'File phải là hình ảnh.',
            'image.mimes' => 'Định dạng ảnh phải là jpg, jpeg, png hoặc gif.',
            'image.max' => 'Dung lượng ảnh không quá 2MB.',
            'category_name.required' => 'Vui lòng chọn ngày.',
            'category_name.in' => 'thể loại phải là: romantic, comedy hoặc detective.',
        ]);
        // Lưu file vào thư mục "images" bên trong storage/app/public
        // -> Đường dẫn: storage/app/public/images
        $imagePath = $request->file('image')->store('images', 'public');
        // Kết quả ví dụ: "images/abcXYZ.jpg"
        $product = Product::create([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
            'category_name' => $request->category_name,
        ]);
        return redirect()->route('product.index')->with('success', 'Thêm sản phẩm thành công!');
    }
    public function edit($id)
    {

        $item = Product::findOrFail($id);
        return view('Product.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
            'category_name' => 'required|in:romantic,detective,comedy',
        ], [
            'product_name.required' => 'Vui lòng chọn tên.',
            'description.required' => 'Vui lòng nhập số lượng.',
            'price.integer' => 'Số lượng phải là số nguyên.',
            'image.image' => 'File phải là hình ảnh.',
            'image.mimes' => 'Định dạng ảnh phải là jpg, jpeg, png hoặc gif.',
            'image.max' => 'Dung lượng ảnh không quá 2MB.',
            'category_name.required' => 'Vui lòng chọn ngày.',
            'category_name.in' => 'thể loại phải là: romantic, comedy hoặc detective.',
        ]);
        $product = Product::find($id);
        
        // Lưu file vào thư mục "images" bên trong storage/app/public
        // -> Đường dẫn: storage/app/public/images
        $imagePath = $request->file('image')->store('images', 'public');
        // Kết quả ví dụ: "images/abcXYZ.jpg"
        $product->update([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
            'category_name' => $request->category_name,
        ]);
        return redirect()->route('product.index')->with('success', 'Cập nhật thành công.');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Sản phẩm đã được xóa.');
    }
}
