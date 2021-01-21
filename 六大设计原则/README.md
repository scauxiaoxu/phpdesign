### 六大设计原则

- 单一职责原则 (Single Responsibility Principle)
- 开闭原则 (Open Closed Principle)
- 里氏替换原则 (Liskov Substitution Principle)
- 迪米特法则 (Law of Demeter)
- 接口隔离原则 (Interface Segregation Principle)
- 依赖倒置原则 (Dependence Inversion Principle)

---------

##### 里氏替换原则
关于继承相关，类B继承类A时,除增加新的方法完成增加功能外, 尽量不要重写父类中的原有方法，也不要重载父类的原有方法

通俗讲:子类可以扩展父类原有的功能，但不能改变父类原有的功能。