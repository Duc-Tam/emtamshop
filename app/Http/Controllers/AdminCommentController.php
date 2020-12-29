<?php

namespace App\Http\Controllers;
use App\Comments;
use Illuminate\Http\Request;

class AdminCommentController extends Controller
{
    public function index(){
        $comments = Comments::where('parent_comment_id','0')->get();
        $repcomment = Comments::all();
        return view('admin.comment.index',compact('comments','repcomment'));
    }
    public function replay(Request $request, $id){
        $comments = Comments::find($id);
        $data = [
            'user_id'        => '0',
            'product_id'     => $comments->products->id,
            'name'           => 'Tâm Shop',
            'content'        => $request->content,
            'status'         => 1,
            'parent_comment_id' => $comments->id
        ];
        $comment = Comments::create($data);
        return redirect()->back()->with('success','Trả lời bình luận thành công');
    }
    public function active($id){
        $comments = Comments::find($id);
        $comments->status = ! $comments->status;
        $comments->save();
        return redirect()->back();
    }
    public function delete($id){
        $comments = Comments::find($id);
        if($comments){
            $comments->delete();
        }
        return redirect()->back()->with('success','Xóa bình luận thành công');
    }
}