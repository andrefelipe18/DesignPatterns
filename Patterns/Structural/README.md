# Propósito

Os padrões de projeto estruturais (Structural Patterns) **são padrões que lidam com a composição de classes e objetos**. Eles ajudam a garantir que, quando uma das partes de um sistema muda, o sistema inteiro não precisa mudar. Eles também ajudam a garantir que, quando o sistema precisa ser expandido, isso possa ser feito sem grandes mudanças no sistema existente. **Se preocupam com a forma como os objetos são compostos para formar estruturas maiores**.

- **Composite**: Permite que você componha objetos em estruturas de árvore para representar hierarquias parte-todo.
- **Adapter**: Permite que objetos com interfaces incompatíveis trabalhem juntos.
- **Bridge**: Separa uma abstração de sua implementação, de modo que as duas possam variar independentemente.
- **Decorator**: Permite que você adicione responsabilidades a objetos dinamicamente.
- **Facade**: Fornece uma interface unificada para um conjunto de interfaces em um subsistema. Facade define uma interface de nível mais alto que facilita o uso do subsistema.
- **Flyweight**: Permite que você use compartilhamento para suportar eficientemente grandes quantidades de objetos de granularidade fina.
- **Proxy**: Fornece um substituto ou espaço reservado para outro objeto para controlar o acesso a ele.

# Problema

Imagine que você está criando um sistema de gerenciamento de contas bancárias. Você tem uma classe `Account` que representa uma conta bancária. Você também tem uma classe `Bank` que representa um banco. O banco tem várias contas bancárias. Você deseja que o banco possa adicionar, remover e acessar contas bancárias. Você também deseja que o banco possa calcular o saldo total de todas as contas bancárias.

# Solução

Para resolver esse problema, você pode usar o padrão de projeto Composite. O padrão Composite permite que você componha objetos em estruturas de árvore para representar hierarquias parte-todo. Com o padrão Composite, você pode tratar objetos individuais e composições de objetos de maneira uniforme.