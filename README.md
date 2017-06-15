.checkout
=========
Создать небольшой проект, используя
Symfony 2.x
MySql
Doctrine
Twig
 
1. Backend на Symfony2

Проект должен состоять из 3-х страниц:
- Главная: site.com.
- Страница категории: http://site.com/category/name/
- Страница товара: http://site.com/item/name/

1.1 На главной странице отображатся все товары из БД.
В правой колонке на главной странице отображается блок ссылок на категории товаров. Переходя по которой отображаются товары из данной категории.
1.2 Категории хранятся в таблице с 2 полями: id(primary key), name.
1.3 Товары хранятся в таблице с полями: id(primary key), name
1.4 Между таблицами товаров и категорий действуют отношение Many-to-Many
1.5 Структура таблиц должна описываться в анатационном формате
1.6 Запросы должны выполняться с помощью ORM Doctrine
1.7 Код должен соответствовать стандарту PSR-2
 
2. Frontend
 
 
2.1 нужно сверстать страницу, шириной 980px. Расположена по центру экрана монитора;
2.2 на странице есть хедер, центр и футер;
2.3 в хедере 6 пунктом меню, все расположены горизонтально;
2.4 пункты меню разноцветные, чтоб можно было отличить;
2.5 при уменьшении окна браузера меньше чем 980 но больше чем общая ширина 3-х пунктов то меню перерисовывается в 2 радя и 3 колонки. Если еще уменьшать окно, то меню снова перерисуется в 3 ряда и 2 колонки. И дальше, если окно меньше ширины двух пунктов то весь блок по центру и все пункты меню в 6 рядов и 1 колонку. Коротко говоря юзабельная верстка.
2.6 если ширина окна меньше ширины одно пункта меню то они скрываются и показывается одна кнопка которая обозначает меню(как на смартфонах три горизонтальные линии);
2.7 в центральной части этой страницы есть форма для отправки сообщения, с полями: имя, email отправителя, текст сообщения;
- (будет дополнительным плюсом) добавить jQuery Validation на поля формы.
 
БОНУС: Админка SonataAdminBundle и управление товарами.
- авторизация в админке, с вводом каптчи.
- CRUD товаров.
- пагинация товаров на главной странице.
