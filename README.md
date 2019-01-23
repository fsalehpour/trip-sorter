# trip-sorter

Sorting a stack of boarding cards, based on Eulerian path and circuit algorithms.

## Requirements

- PHP 7.1 or better.
- PHPUnit if you are going to run the tests.

## Assumptions

We assume that none of the cities is a non-reachable city.

## Install

After cloning the repository please run in the cloned directory:

```bash
$ cd trip-sorter
$ composer install
```

## Run tests

```bash
$ ./vendor/bin/phpunit
```

## Run examples provided

```bash
$ php examples/simple_path.php
$ php examples/simple_circuit.php
$ php examples/repeated_node_path.php
$ php examples/repeated_node_circuit.php
$ php examples/no_existing_path.php
```

## Usage

### Boarding Cards

Various types of boarding cards can be created using different types defined in the project, such as `BusBoardingCard`, 
`TrainBoardingCard`, and `FlightBoardingCard`. All of these are extending the abstract data type `AbstractBoardingCard`,
which in turn implements `EdgeInterface`. The extended classes have fluent setters which enables them to receive the
values for an instance like this:

```php
$boardingCard = (new TrainBoardingCard())
        ->setTrainNo('78A')
        ->setFrom('Madrid')
        ->setTo('Barcelona')
        ->setSeat('45B')

```

Please use an array of boarding cards to represent a stack of boarding cards needing to be sorted.

```php
$cards = [
    (new FlightBoardingCard())
        ->setFlightNo('SK455')
        ->setFrom('Girona Airport')
        ->setTo('Stockholm')
        ->setGate('45B')
        ->setSeat('3A')
        ->setBaggage('Baggage drop at ticket counter 344.'),

    (new BusBoardingCard())
        ->setName('the airport bus')
        ->setFrom('Barcelona')
        ->setTo('Girona Airport'),

    (new FlightBoardingCard())
        ->setFlightNo('SK22')
        ->setFrom('Stockholm')
        ->setTo('New York JFK')
        ->setGate('22')
        ->setSeat('7B')
        ->setBaggage('Baggage will be automatically transferred from your last leg.'),

    (new TrainBoardingCard())
        ->setTrainNo('78A')
        ->setFrom('Madrid')
        ->setTo('Barcelona')
        ->setSeat('45B'),
];
```

### Directed Graph Representation by Adjacency List 

The __stack of cards__ can then be passed to the factory method of the `AdjacencyList` class to create an adjacency list
of a graph comprising of cities or locations as vertices and boarding cards as edges.

```php
$list = AdjacencyList::createFromArray($cards);
```

Alternatively, the list can be instantiated first and then each edge can be added separately.

```php
$list = new AdjacencyList();
$list->add($edge);
```

### Sorting

The `Sorter` class, accepts an `AdjacencyList` object containing edges (in our case, boarding cards) as the only 
parameter of its constructor. After instantiation calling the sort method on the object will proceed with checking and
sorting the given edges (boarding cards) and finally returns the sorted list as an array of edges.

```php
$sorter = new Sorter($list);
$sorted = $sorter->sort();
```

### Output Formatting

The sorted list, or any array of the boarding cards, can be formatted to HTML list or plain text list of formatted 
boarding cards as:

```php
$text = BoardingCardFormatter::cardsToPlainText($sortedArrayOfBoardingClasses);
$html = BoardingCardFormatter::cardsToHtml($sortedArrayOfBoardingClasses);
```

Single boarding cards can be formatted as well:

```php
$text = BoardingCardFormatter::toPlainText($trainBoardingCard);
$html = BoardingCardFormatter::toHtml($flightBoardingCard);
```

## Extending New Types of Transport

You can create new types of transport as long as they extend the `AbstractBoardingCard` or implement `EdgeInterface`.

## Sorting Algorithm

The sorting is done using the Eulerian path/circuit algorithm for directed graph. The complexity of the algorithm is
`O(V+E)`, where `V` is the number of vertices and `E` is the number of edges.
