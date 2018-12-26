# ueditor改版
添加独立上传按键功能
修复百度图片搜索功能并修改部分小功能

```UE.getUpload(ElementID,type,callbackFunc);```

其中:

ElementID为需要添加独立上传功能的元素按键或DIV的ID

type为上传功能类型字符串,('single':单图上传;'multi':多图上传,'attachment':附件上传)

callbackFunc为回调方法,唯一返回参数result为上传成功后的图片数据,其中单图上传的result为对象,其他为对象的数组
result.title文件原名称,result.src文件路径


注：single单图上传的按钮请直接给个空DIV即可
