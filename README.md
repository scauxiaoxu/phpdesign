# phpdesign

结合一些框架源码 以及 《深入PHP：面向对象、模式与实践》书中讲解的一些设计模式进行总结和归类

示例中的代码基于PHP7.4.3实现

---
### 设计模式基本原则

- 按接口编程而不是按实现来编程 (Program to an interface, not an implementation)

- 优先使用组合而不是继承(Favor object composition over class inheritance.)

### 六大原则

[参考这里](./六大设计原则/README.md)


### 分类 

>生成对象：单例，简单工厂，工厂方法，抽象工厂，建造者模式，原型模式

>结构型模式：适配器,桥接,组合,装饰(装饰者 装饰器),门面(外观),享元,代理

> 行为型模式：策略,模板方法,观察者,迭代器,责任链,命令模式

### 代码实现

1. [继承与组合](./组合与继承/README.md)
2. [单例模式](./单例模式/index1.php)
3. [简单工厂模式](./简单工厂模式/README.md)
4. [工厂方法模式 - Factory Method](./工厂方法模式/index1.php)
5. [抽象工厂模式 - Abstract Factory](./抽象工厂模式/index1.php)
6. [建造者模式 - Builder](./建造者模式/index1.php)
7. [原型模式 - Prototype](./原型模式/index1.php)
8. [适配器模式 - Adapter](./适配器模式/index1.php)
9. [桥接模式 - Bridge](./桥接模式/index1.php)
10. [组合/合成模式 - Composite](./组合模式/index1.php)
11. [装饰器模式 - Decorator](./装饰器/index1.php)
12. [门面模式 - Facade](./门面模式/index1.php)
13. [享元模式 - Flyweight](./享元模式/index1.php)
14. [代理模式 - Proxy](./代理模式/index1.php)
15. [策略模式 - Strategy](./策略模式/index1.php)
16. [模板方法模式 - Template Method](./模板方法/index1.php)
17. [观察者模式 - Observer](./观察者模式/index1.php)
18. [迭代器模式 - Iterator](./迭代器模式/index1.php)
19. [责任链模式 - Chain of responsibility](./责任链模式/index1.php)
20. [命令模式- Command](./命令模式/index1.php)


### 参考
- https://github.com/domnikl/DesignPatternsPHP
- https://github.com/baijunyao/design-patterns

### License
[MIT](https://github.com/scauxiaoxu/phpdesign/blob/main/LICENSE)