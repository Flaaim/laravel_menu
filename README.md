## Admin panel
1. lavary menu
### rendering template
1. Создаем класс Base.php прописываем namespace and use. Base extends Controller. Все остальные контроллеры extends Base.
2. В Base создаем необходимые свойства protected $user, $content, $template, $vars and etc
3. Создаем конструктор __construct();
```
public function __construct(){
    $this->template = 'layout'; //указываем необходмый шаблон blade
    $this->middleware(function($request, $next)){
        $this->user = Auth:user();
        return $next($request);
    }
}
```
4. Создаем метод renderOutput(); Данный метод будет отвечать за отображение шаблонов.
```

public function renderOutput(){
    
    return view($this->template)->with($this->vars);
}

```
5. В переменной $vars[] будут храниться переменные шаблона. Например $content

```
$this->content = Arr::add($this->vars, 'content', $this->content);

public function renderOutput(){
    $this->content = Arr::add($this->vars, 'content', $this->content);
    return view($this->template)->with($this->vars);
}
```
6. Чтобы добавить в шаблон $template данные необходимо:
```
SameController extends Base {

    public function index (){
        $this->content = view('index')->render();

        return $this->renderOutput();
    }
}