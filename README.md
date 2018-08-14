
**http://localhost/api/get?json=$params**

_params = [{"transport":{"type":"train","number":"34F"},"route":{"from":"Saint%20Petersburg","to":"Moscow","name":"54S"},"seat":18},{"transport":{"type":"bus","number":"BBE%208420"},"route":{"from":"Tyumen","to":"Voronezh","name":"8M"},"seat":4},{"transport":{"type":"flight","number":"2L"},"route":{"from":"Moscow","to":"Tyumen","name":"2L"},"seat":26},{"transport":{"type":"balloon","number":"7777"},"route":{"from":"Lipetsk","to":"Saint%20Petersburg","name":"48Y"},"seat":42}]_

Result
`{"status":true,"result":{"str":"Take balloon from Lipetsk to Saint Petersburg. Route number 48Y. Seat 42\nTake train from Saint Petersburg to Moscow. Route number 54S. Seat 18\nTake flight from Moscow to Tyumen. Route number 2L. Seat 26\nTake bus from Tyumen to Voronezh. Route number 8M. Seat 4\n","items":["Take balloon from Lipetsk to Saint Petersburg. Route number 48Y. Seat 42","Take train from Saint Petersburg to Moscow. Route number 54S. Seat 18","Take flight from Moscow to Tyumen. Route number 2L. Seat 26","Take bus from Tyumen to Voronezh. Route number 8M. Seat 4"]}}`

**PS**
В HomeController в методе index есть $arr, это как раз те данные которые вы наблюдаете выше в params