<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Products;
use App\Models\Categories;
// use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function allProducts(Request $request)
    {
        // Lấy danh sách sản phẩm
        $query = Products::query();

        // Kiểm tra tham số `sort` và áp dụng sắp xếp
        if ($request->sort == 'asc') {
            $query->orderBy('sale_price', 'asc');
        } elseif ($request->sort == 'desc') {
            $query->orderBy('sale_price', 'desc');
        } elseif ($request->sort == 'discount') {
            $query->orderByRaw('(regular_price - sale_price) DESC');
        } else {
            // Nếu không có sort, lấy ngẫu nhiên
            $query->inRandomOrder();
        }

        // Phân trang
        $products = $query->paginate(8);

        return view('products', compact('products'));
    }

    //     // Tùy chỉnh phân trang
    //     $currentPage = $products->currentPage();
    //     $lastPage = $products->lastPage();
    //     $pageLinks = [];

    //     // Giới hạn số trang hiển thị (ví dụ: 3 trang trước và 3 trang sau)
    //     $startPage = max($currentPage - 3, 1);
    //     $endPage = min($currentPage + 3, $lastPage);

    //     // Tạo mảng các trang hiển thị
    //     for ($i = $startPage; $i <= $endPage; $i++) {
    //         $pageLinks[] = $i;
    //     }

    //     // Truyền các biến vào view
    //     return view('products', compact('products', 'pageLinks'));
    // }

    public function getTopSale()
    {
        $topProducts = Products::select('id', 'product_name', 'regular_price', 'sale_price', 'product_img')
            ->orderByRaw('(regular_price - sale_price) DESC') // Sắp xếp theo giá trị giảm giá (regular_price - sale_price)
            ->take(8)
            ->get();
        // dd($topProducts);
        return $topProducts;
    }

    public function getTopMobile()
    {
        $mobileCategoryId = Categories::where('cate_name', 'Mobile Phone')->value('id');


        $topProducts = Products::select('id', 'product_name', 'regular_price', 'sale_price', 'product_img')
            ->where('cate_id', $mobileCategoryId) // Lọc sản phẩm theo cate_id là "Mobile Phone"
            ->take(4)
            ->get();

        return $topProducts;
    }
    public function newProduct()
    {
        $newProducts = Products::orderBy('created_at', 'desc')
            ->take(4)->get();
        return $newProducts;
    }
    public function getTopLaptop()
    {
        $mobileCategoryId = Categories::where('cate_name', 'Laptop')->value('id');


        $topProducts = Products::select('id', 'product_name', 'regular_price', 'sale_price', 'product_img')
            ->where('cate_id', $mobileCategoryId) // Lọc sản phẩm theo cate_id là "Mobile Phone"
            ->take(4)
            ->get();

        return $topProducts;
    }

    public function allProductsByCategory(Request $request, $categoryName)
    {
        // Lấy ID của danh mục theo tên
        $categoryID = Categories::where('cate_name', $categoryName)->value('id');

        if (!$categoryID) {
            abort(404, 'Category not found');
        }

        // Khởi tạo query
        $query = Products::query()
            ->where('cate_id', $categoryID)
            ->select('id', 'product_name', 'regular_price', 'sale_price', 'product_img');

        // Kiểm tra và áp dụng sort
        if ($request->sort == 'asc') {
            $query->orderBy('sale_price', 'asc');
        } elseif ($request->sort == 'desc') {
            $query->orderBy('sale_price', 'desc');
        } elseif ($request->sort == 'discount') {
            $query->orderByRaw('(regular_price - sale_price) DESC');
        } else {
            $query->inRandomOrder();
        }

        // Phân trang
        $products = $query->paginate(8);

        return view('products', compact('products'));
    }

    // Gọi hàm này cho từng danh mục, truyền request vào
    public function allMobile(Request $request)
    {
        return $this->allProductsByCategory($request, 'Mobile Phone');
    }

    public function allLaptop(Request $request)
    {
        return $this->allProductsByCategory($request, 'Laptop');
    }

    public function allTablet(Request $request)
    {
        return $this->allProductsByCategory($request, 'Tablet');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $request->flash();
        if ($query) {
            $products = Products::where('product_name', 'like', '%' . $query . '%')->paginate(8);
        }

        return view('products', compact('products', 'query'));
    }

    public function allPC(Request $request)
    {
        return $this->allProductsByCategory($request, 'PC');
    }
    public function allMonitor(Request $request)
    {
        return $this->allProductsByCategory($request, 'Monitor');
    }

    public function allMobileAcc(Request $request)
    {
        return $this->allProductsByCategory($request, 'Mobile accessories');
    }
    public function allLaptopAcc(Request $request)
    {
        return $this->allProductsByCategory($request, 'Laptop accessories');
    }
    public function allAudio(Request $request)
    {
        return $this->allProductsByCategory($request, 'Audio accessories');
    }

    public function productDetails($id)
    {
        $product = Products::find($id);
        // $colors = $product->colors;

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        return view('productdetails', compact('product'));
    }

    public function allMobileAccess()
    {
        $cateID = Categories::where('cate_name', 'Mobile Accessories')->value('id');
        $products = Products::inRandomOrder()->select('id', 'product_name', 'regular_price', 'sale_price', 'product_img')
            ->where('cate_id', $cateID)
            ->where('type', ['charger', 'Cable'])
            ->paginate(8);

        return view('products', compact('products'));
    }
    public function allAdapter()
    {
        $cateID = Categories::where('cate_name', 'Mobile Accessories')->value('id');
        $products = Products::inRandomOrder()->select('id', 'product_name', 'regular_price', 'sale_price', 'product_img')
            ->where('cate_id', $cateID)
            ->where('type', 'Adaper')
            ->paginate(8);

        return view('products', compact('products'));
    }
    public function allCase()
    {
        $cateID = Categories::where('cate_name', 'Mobile Accessories')->value('id');
        $products = Products::inRandomOrder()->select('id', 'product_name', 'regular_price', 'sale_price', 'product_img')
            ->where('cate_id', $cateID)
            ->where('type', 'case')
            ->paginate(8);

        return view('products', compact('products'));
    }
    // public function allCable()
    // {
    //     $cateID = Categories::where('cate_name', 'Mobile Accessories')->value('id');
    //     $products = Products::inRandomOrder()->select('id', 'product_name', 'regular_price', 'sale_price', 'product_img')
    //         ->where('cate_id', $cateID)
    //         ->where('type', 'Cable')
    //         ->paginate(8);

    //     return view('products', compact('products'));
    // }


    public function addWishlist($id)
    {
        $product = Products::find($id);

        return view('wishlist', compact('product'));
    }
}
