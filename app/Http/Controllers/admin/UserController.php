<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Models\User;
use App\Services\Interfaces\UserServiceInterface;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Hash;
use App\Services\UserService;
use App\Http\Requests\UpdateUserRequest;


class UserController extends Controller
{
    //

    protected $userServiceInterface;
    protected $userService;
    public function __construct(UserServiceInterface $userServiceInterface, UserService $userService)
    {
        $this->userServiceInterface = $userServiceInterface;
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        $users = $this->userService->pagination();


        $title = config('apps.user');
        $config = $this->config();

        $template = 'admin.dashboard.user.index';
        return view('admin.dashboard.layout', compact('template', 'config', 'users', 'title'));
    }


    public function paginationByKeyword()
    {
        echo 123;
    }

    public function create()
    {
        $title = config('apps.user');
        // dd($title);
        $config = $this->config();
        $template = 'admin.dashboard.user.create';
        return view('admin.dashboard.layout', compact('template', 'config', 'title'));
    }

    public function store(StoreUserRequest $storeUserRequest)
    {
        if ($this->userService->create($storeUserRequest)) {
            return redirect()->route('admin.dashboad.user')->with('success', 'Thêm mới thành viên thành công');
        }
        return redirect()->route('admin.dashboad.user')->with('error', 'Có lỗi xảy ra');
    }

    public function edit($id)
    {

        $userById = $this->userService->findById($id);
        // dd($user);
        $config = $this->config();
        $title = config('apps.user');
        $template = 'admin.dashboard.user.update';
        return view('admin.dashboard.layout', compact('template', 'config', 'title', 'userById'));
    }

    public function update($id, UpdateUserRequest $updateUserRequest)
    {
        if ($this->userService->update($id, $updateUserRequest)) {
            return redirect()->route('admin.dashboad.user')->with('success', 'Cập nhật thành viên thành công');
        }
        return redirect()->route('admin.dashboad.user')->with('error', 'Có lỗi xảy ra');
    }

    public function delete($id)
    {
        $userById = $this->userService->findById($id);
        $config = $this->config();
        $title = config('apps.user');
        $template = 'admin.dashboard.user.delete';
        return view('admin.dashboard.layout', compact('template', 'config', 'title', 'userById'));
    }


    public function destroy($id)
    {
        if ($this->userService->destroy($id)) {
            return redirect()->route('admin.dashboad.user')->with('success', 'Xóa thành viên thành công');
        }
        return redirect()->route('admin.dashboad.user')->with('error', 'Có lỗi xảy ra');
    }
    public function config()
    {
        return [
            'js' => [
                ' backend/js/plugins/switchery/switchery.js',
                ' backend/plugin/ckfinder.js',
                ' backend/js/library/finder.js',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                ' backend/js/library/library.js'
            ],

            'css' => [
                'backend/css/plugins/switchery/switchery.css',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
            ]

        ];
    }
}
