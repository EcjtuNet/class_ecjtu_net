
#class.ecjtu.net api 说明
## 参数说明
* `url`： http://class.ecjtu.net/api.php
* `method`: get/post
* `type`: json/jsonp
* `param`: classID (区分大小写)
*  示例 
```javascript
  $.ajax({
    type:"get",//post
    url:"http:class.ecjtu.net/api.php",
    data:{classID:yourclassID},
    dataType:"json",//jsonp
    success:success
  });
```

##返回值说明
* json
    * 0: 课程节次
    * 1～7：周一至七课程 如果课程为空，则内容为空

```javascript
{
    "content": {
        "0": {
            "0": "1 - 2",
            "1": "3 - 4",
            "2": "5 - 6",
            "3": "7 - 8",
            "4": "9 - 10"
        },
        "1": {
            "0": " 税法\n杨青 15-201\n1-14 1,2",
            "1": " 操作系统（B）\n石红芹 15-421\n1-16 3,4",
            "2": " 软件测试技术（B）\n赵丽萍 15-321\n1-11 5,6,7",
            "3": " 软件测试技术（B）\n赵丽萍 15-321\n1-11 5,6,7",
            "4": " "
        },
        "2": {
            "0": " ",
            "1": " 管理会计学\n胡俊南 15-201\n1-14 3,4",
            "2": " 计算机网络（B）\n王长征 15-421\n1-16 5,6,7",
            "3": " 计算机网络（B）\n王长征 15-421\n1-16 5,6,7",
            "4": " "
        },
        "3": {
            "0": " 成本会计学\n袁细寿 15-202\n1-14 1,2",
            "1": " 操作系统（B）\n石红芹 15-421\n1-16[单] 3,4\nC#语言（B）\n尹燕 15-421\n1-16[双] 3,4",
            "2": " 经济法学\n钟金 15-421\n1-16 5,6,7",
            "3": " 经济法学\n钟金 15-421\n1-16 5,6,7",
            "4": " "
        },
        "4": {
            "0": " 税法\n杨青 15-202\n1-14 1,2",
            "1": " 管理会计学\n胡俊南 15-202\n1-14 3,4",
            "2": " 形势政策与省情教育III\n王涛(8164) 15-205\n6-9 5,6",
            "3": " ",
            "4": " "
        },
        "5": {
            "0": " 成本会计学\n袁细寿 15-202\n1-14 1,2",
            "1": " C#语言（B）\n尹燕 15-421\n1-16 3,4",
            "2": " ",
            "3": " ",
            "4": " "
        },
        "6": {
            "0": " ",
            "1": " ",
            "2": " ",
            "3": " ",
            "4": " "
        },
        "7": {
            "0": " ",
            "1": " ",
            "2": " ",
            "3": " ",
            "4": " "
        }
    },
    "error": null
}
```
*jsonp

     callback(json)
```javascript
callback({"content":{"0":{"0":"1 - 2","1":"3 - 4","2":"5 - 6","3":"7 - 8","4":"9 - 10"},"1":{"0":" \u7a0e\u6cd5\n\u6768\u9752 15-201\n1-14 1,2","1":" \u64cd\u4f5c\u7cfb\u7edf\uff08B\uff09\n\u77f3\u7ea2\u82b9 15-421\n1-16 3,4","2":" \u8f6f\u4ef6\u6d4b\u8bd5\u6280\u672f\uff08B\uff09\n\u8d75\u4e3d\u840d 15-321\n1-11 5,6,7","3":" \u8f6f\u4ef6\u6d4b\u8bd5\u6280\u672f\uff08B\uff09\n\u8d75\u4e3d\u840d 15-321\n1-11 5,6,7","4":" "},"2":{"0":" ","1":" \u7ba1\u7406\u4f1a\u8ba1\u5b66\n\u80e1\u4fca\u5357 15-201\n1-14 3,4","2":" \u8ba1\u7b97\u673a\u7f51\u7edc\uff08B\uff09\n\u738b\u957f\u5f81 15-421\n1-16 5,6,7","3":" \u8ba1\u7b97\u673a\u7f51\u7edc\uff08B\uff09\n\u738b\u957f\u5f81 15-421\n1-16 5,6,7","4":" "},"3":{"0":" \u6210\u672c\u4f1a\u8ba1\u5b66\n\u8881\u7ec6\u5bff 15-202\n1-14 1,2","1":" \u64cd\u4f5c\u7cfb\u7edf\uff08B\uff09\n\u77f3\u7ea2\u82b9 15-421\n1-16[\u5355] 3,4\nC#\u8bed\u8a00\uff08B\uff09\n\u5c39\u71d5 15-421\n1-16[\u53cc] 3,4","2":" \u7ecf\u6d4e\u6cd5\u5b66\n\u949f\u91d1 15-421\n1-16 5,6,7","3":" \u7ecf\u6d4e\u6cd5\u5b66\n\u949f\u91d1 15-421\n1-16 5,6,7","4":" "},"4":{"0":" \u7a0e\u6cd5\n\u6768\u9752 15-202\n1-14 1,2","1":" \u7ba1\u7406\u4f1a\u8ba1\u5b66\n\u80e1\u4fca\u5357 15-202\n1-14 3,4","2":" \u5f62\u52bf\u653f\u7b56\u4e0e\u7701\u60c5\u6559\u80b2III\n\u738b\u6d9b(8164) 15-205\n6-9 5,6","3":" ","4":" "},"5":{"0":" \u6210\u672c\u4f1a\u8ba1\u5b66\n\u8881\u7ec6\u5bff 15-202\n1-14 1,2","1":" C#\u8bed\u8a00\uff08B\uff09\n\u5c39\u71d5 15-421\n1-16 3,4","2":" ","3":" ","4":" "},"6":{"0":" ","1":" ","2":" ","3":" ","4":" "},"7":{"0":" ","1":" ","2":" ","3":" ","4":" "}},"error":null})
```