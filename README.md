# Design Patterns in PHP

A practical, clean, and modern implementation of Software Design Patterns in **PHP 8.2+**, containerized with Docker.

---

## Table of Contents

- [Creational Patterns](#creational-patterns)
  - [1. Singleton Pattern](#1-singleton-pattern)
  - [2. Factory Method Pattern](#2-factory-method-pattern)
  - [3. Builder Pattern](#3-builder-pattern)
  - [4. Prototype Pattern](#4-prototype-pattern)
- [Structural Patterns & Principles](#structural-patterns--principles)
  - [Composition over Inheritance](#composition-over-inheritance)
  - [Proxy Pattern](#proxy-pattern)
  - [Facade Pattern](#facade-pattern)
  - [Decorator Pattern](#decorator-pattern)
  - [Adapter Pattern](#adapter-pattern)
- [Behavioral Patterns](#behavioral-patterns)
  - [Observer Pattern](#observer-pattern)
- [Getting Started](#getting-started)
  - [Running with Docker](#running-with-docker)
  - [Running Directly with PHP CLI](#running-directly-with-php-cli)
- [Directory Structure](#directory-structure)

---

## Creational Patterns

Creational design patterns deal with object creation mechanisms, increasing flexibility and reuse of existing code.

### 1. Singleton Pattern
> Ensures that a class has **only one instance** and provides a global point of access to it.

* **Folder:** `Singletone/`
* **Implementations Included:**
  * **Eager Initialization (`classes/EagerInitialization.php`):** The instance is instantiated upfront as soon as the script or file is loaded.
  * **Lazy Initialization (`classes/LazyInitialition.php`):** Creation of the instance is deferred until `getInstance()` is called for the first time.
  * **Thread-Safe Singleton (`classes/ThreadSafe.php`):** Uses **Double-Checked Locking** with mutual exclusion (`flock`) to guard against race conditions in concurrent execution environments.
  * **Guards:** Private constructors, private `__clone()`, and `__wakeup()` methods to prevent bypass via cloning or deserialization.
* **Common Use Cases:** Database connections, Logger, Cache managers, Driver handlers.

---

### 2. Factory Method Pattern
> Provides an interface for creating objects in a superclass, while allowing subclasses to alter the type of objects that will be created.

* **Folder:** `Factory/`
* **Key Components:**
  * **Abstract Product (`classes/Vehicle.php`):** Defines contract and shared logic (`getWheel()`, `getString()`).
  * **Concrete Products (`classes/Car.php`, `classes/Bike.php`):** Implementations of specific vehicles.
  * **Factory (`VehicleFactory.php`):** Decouples client code from concrete classes using modern PHP `match` expression dispatching.
* **Common Use Cases:** Cross-platform UI elements, Payment gateways (Stripe, PayPal), Notification dispatchers (SMS, Email).

---

### 3. Builder Pattern
> Lets you construct complex objects step by step. Allows producing different types and representations of an object using the same construction code.

* **Folder:** `Builder/`
* **Key Components:**
  * **Product (`Vehicle.php`):** The complex object to be built.
  * **Builder (`VehicleBuilder.php`):** Provides a fluent interface (`setEngine()`, `setWheel()`, `setAirbags()`) to assemble parameters before calling `build()`.
* **Common Use Cases:** SQL Query Builders, Complex configurations, Order & Price calculators with optional discounts and taxes.

---

### 4. Prototype Pattern
> Allows copying existing objects without making your code dependent on their classes, and modifying the cloned copy independently.

* **Folder:** `Prototype/`
* **Key Components:**
  * **Prototype Class (`Vehicle.php`):** Encapsulates an internal list of items (`$carList`) and provides a `clone()` method that creates a new independent instance with the current state.
  * **Client / Runner (`Prototype.php`):** Instantiates a base vehicle list prototype, creates an independent copy via `clone()`, and appends new items to the clone without mutating the original object.
* **Why Use It:**
  * Avoids expensive re-initialization or redundant data fetching when creating similar objects.
  * Guarantees isolation: mutating the cloned object leaves the original prototype state intact.
* **Common Use Cases:** Cloning pre-configured templates, caching/spawning complex object graphs, creating isolated copies of expensive database entities.

---

## Structural Patterns & Principles

### Composition over Inheritance
> Promotes designing systems where classes achieve polymorphic behavior and code reuse by **containing instances of other classes** ("HAS-A") rather than inheriting ("IS-A").

* **Folder:** `Composition/`
* **Key Components:**
  * **Contracts (`interfaces/`):** `EngineInterface`, `GpsInterface`, `AudioInterface`.
  * **Concrete Implementations (`classes/`):** `V8GasEngine`, `ElectricEngine`, `SatelliteGps`, `BluetoothSoundSystem`.
  * **Composed Class (`Car.php`):** Aggregates interfaces, allowing hot-swapping components at runtime (e.g., switching a car engine from V8 to Electric on the fly).


---

### Proxy Pattern
> Provides a surrogate or placeholder for another object to control access to it, allowing operations to be performed before or after the request reaches the target object.

* **Folder:** `Proxy/`
* **Key Components:**
  * **Subject Interface (`interfaces/DatabaseExecuter.php`):** Defines the common contract (`excecuteDatabase()`) implemented by both the real subject and the proxy.
  * **Real Subject (`DatabaseExecuterImpl.php`):** Implements direct execution logic for database queries.
  * **Protection Proxy (`DatabaseExecuterProxy.php`):** Wraps the real subject and controls access based on credentials (e.g., restricting destructive queries like `DELETE` to administrator roles).
  * **Client / Runner (`Proxy.php`):** Demonstrates how the proxy intercepts unauthorized requests for non-admin users while allowing authorized queries for admin users.
* **Why Use It:**
  * **Access Control (Protection Proxy):** Protects sensitive or destructive actions by checking permissions before delegating to the target object.
  * **Separation of Concerns:** Keeps authorization and access-control logic decoupled from core database execution.
* **Common Use Cases:** Access control / Authorization proxies, Lazy loading (Virtual Proxy), Caching expensive operations (Cache Proxy), Logging and request auditing. 

---

### Facade Pattern
> Provides a simplified, high-level interface to a complex subsystem or set of interfaces, making the subsystem easier to use and decoupling clients from internal routing and driver details.

* **Folder:** `Facade/`
* **Key Components:**
  * **Subsystem Classes (`classes/Chrome.php`, `classes/Firefox.php`):** Specialized browser drivers containing vendor-specific logic for driver initialization and generating HTML / JUnit reports.
  * **Facade (`WebExplorerHelperFacade.php`):** Offers a unified static interface (`generateReport()`) that encapsulates driver selection, instantiation, and report routing via PHP `match` expressions.
  * **Client / Runner (`Facade.php`):** Demonstrates generating reports through the facade with a single method call without directly instantiating or managing individual browser driver classes.
* **Why Use It:**
  * **Simplified API:** Shields clients from subsystem complexities, multiple class dependencies, and internal configurations.
  * **Loose Coupling:** Clients interact solely with the Facade; subsystem classes can be modified or extended with zero changes to client code.
* **Common Use Cases:** Unified API clients / SDKs, Multi-driver wrappers (Databases, File Storage, Cache engines), Complex third-party library integrations.

---

### Decorator Pattern
> Allows attaching new behaviors and responsibilities to objects dynamically at runtime by placing them inside special wrapper objects, without altering the underlying class.

* **Folder:** `Decorator/`
* **Key Components:**
  * **Component Contract (`interfaces/Dress.php`):** Common interface declaring `assemble(): void` implemented by both concrete components and decorators.
  * **Concrete Component (`classes/BasicDress.php`):** The foundational base object providing standard behavior.
  * **Base Decorator (`decorator/DressDecorator.php`):** Implements `Dress`, maintains a reference to a wrapped `Dress` instance (`$this->dress`), and forwards `assemble()` calls to it.
  * **Concrete Decorators (`classes/SportyDress.php`, `classes/FancyDress.php`, `classes/CasualDress.php`):** Extend `DressDecorator` to dynamically inject specialized styles and behavior around wrapped objects.
  * **Client / Runner (`Decorator.php`):** Demonstrates creating standalone dresses as well as composing stacked multi-feature combinations (e.g., `CasualDress(FancyDress(BasicDress))` or `SportyDress(FancyDress(BasicDress))`) at runtime.
* **Why Use It:**
  * **Avoids Class Explosion:** Eliminates the need to create static subclass combinations (e.g., `SportyAndFancyDress`, `CasualAndFancyDress`) for every possible feature pairing.
  * **Single Responsibility & Open/Closed Principle:** Each feature is cleanly isolated in its own decorator class and can be combined or extended dynamically without modifying existing classes.
* **Common Use Cases:** Middleware pipelines (HTTP request/response filters), UI styling / widget wrappers, Stream wrappers (Compression, Encryption, Buffering), Dynamic price or discount calculation.

---

### Adapter Pattern
> Allows objects with incompatible interfaces to collaborate by converting the interface of one class into an interface that clients expect.

* **Folder:** `Adapter/`
* **Key Components:**
  * **Target Interface (`interfaces/WebDriver.php`):** The standard domain interface expected by the client (`getElement(): void`, `selectElement(): void`).
  * **Concrete Target (`classes/ChromeDriver.php`):** Direct implementation of the target `WebDriver` interface.
  * **Adaptee (`classes/IEDriver.php`):** An incompatible third-party or legacy class with different method names (`findElement()`, `clickElement()`).
  * **Adapter (`classes/WebDriverAdapter.php`):** Implements `WebDriver` and wraps an instance of `IEDriver`, translating `getElement()` into `findElement()` and `selectElement()` into `clickElement()`.
  * **Client / Runner (`Adapter.php`):** Demonstrates interacting with both native compatible drivers and adapted incompatible drivers seamlessly through the `WebDriver` interface.
* **Why Use It:**
  * **Interoperability:** Enables legacy or third-party classes to work with modern codebases without modifying their original source code.
  * **Single Responsibility & Open/Closed Principle:** Separates interface translation logic from business logic, making it easy to introduce new adapters without altering existing drivers.
* **Common Use Cases:** Third-party SDK wrappers (Payment gateways, Cloud storage), Legacy API modernization, Database or Logger driver normalization.

---

## Behavioral Patterns

Behavioral design patterns are concerned with algorithms and the assignment of responsibilities between objects, characterizing complex control flows.

### Observer Pattern
> Defines a one-to-many subscription dependency between objects so that when one object (Subject) changes state, all its dependents (Observers) are notified and updated automatically.

* **Folder:** `Observer/`
* **Key Components:**
  * **Subject Interface (`interfaces/Subject.php`):** Declares the contract for managing subscribers (`register(Observer $obj): void`, `unRegister(Observer $obj): void`) and broadcasting updates (`notifyObservers(): void`).
  * **Observer Interface (`interfaces/Observer.php`):** Declares the update contract (`update(string $location): void`) for objects that listen for state changes.
  * **Concrete Subject (`classes/DeliveryData.php`):** Maintains a list of registered observers and notifies them whenever the delivery location changes (`locationChange()`).
  * **Concrete Observers (`classes/Seller.php`, `classes/Users.php`, `classes/DeliveryWarehouse.php`):** Implement the `Observer` interface to receive real-time location updates and trigger their respective notification actions.
  * **Client / Runner (`Observer.php`):** Registers `Seller`, `User`, and `DeliveryWarehouse` with a `DeliveryData` subject and triggers a location update event across all subscribers.
* **Why Use It:**
  * **Loose Coupling:** The subject only depends on the `Observer` interface, without knowing the concrete classes or internal implementation of its subscribers.
  * **Open/Closed Principle:** New observers (e.g., SMS services, push notification dispatchers, audit loggers) can be introduced at any time without altering subject code.
  * **Broadcast Communication:** Enables clean, one-to-many event notification workflows across decoupled application layers.
* **Common Use Cases:** Real-time parcel / delivery tracking, Event-driven notifications (Email, SMS, Webhooks), UI state management, Pub/Sub message queues.

---

## Getting Started

### Running with Docker

Start the container environment:

```bash
docker compose up -d
```

Run any pattern runner:

```bash
# Singleton Pattern
docker compose exec php php Singletone/Singleton.php

# Factory Pattern
docker compose exec php php Factory/Factory.php

# Builder Pattern
docker compose exec php php Builder/Builder.php

# Prototype Pattern
docker compose exec php php Prototype/Prototype.php

# Composition Principle
docker compose exec php php Composition/Composition.php

# Proxy Pattern
docker compose exec php php Proxy/Proxy.php

# Facade Pattern
docker compose exec php php Facade/Facade.php

# Decorator Pattern
docker compose exec php php Decorator/Decorator.php

# Adapter Pattern
docker compose exec php php Adapter/Adapter.php

# Observer Pattern
docker compose exec php php Observer/Observer.php
```

### Running Directly with PHP CLI

If you have PHP 8.2+ installed locally:

```bash
php Singletone/Singleton.php
php Factory/Factory.php
php Builder/Builder.php
php Prototype/Prototype.php
php Composition/Composition.php
php Proxy/Proxy.php
php Facade/Facade.php
php Decorator/Decorator.php
php Adapter/Adapter.php
php Observer/Observer.php
```

---

## Directory Structure

```plaintext
.
├── Adapter/
│   ├── classes/
│   │   ├── ChromeDriver.php
│   │   ├── IEDriver.php
│   │   └── WebDriverAdapter.php
│   ├── interfaces/
│   │   └── WebDriver.php
│   └── Adapter.php
├── Builder/
│   ├── Vehicle.php
│   ├── VehicleBuilder.php
│   └── Builder.php
├── Composition/
│   ├── classes/
│   │   ├── BluetoothSoundSystem.php
│   │   ├── ElectricEngine.php
│   │   ├── SatelliteGps.php
│   │   └── V8GasEngine.php
│   ├── interfaces/
│   │   ├── AudioInterface.php
│   │   ├── EngineInterface.php
│   │   └── GpsInterface.php
│   ├── Car.php
│   └── Composition.php
├── Decorator/
│   ├── classes/
│   │   ├── BasicDress.php
│   │   ├── CasualDress.php
│   │   ├── FancyDress.php
│   │   └── SportyDress.php
│   ├── decorator/
│   │   └── DressDecorator.php
│   ├── interfaces/
│   │   └── Dress.php
│   └── Decorator.php
├── Facade/
│   ├── classes/
│   │   ├── Chrome.php
│   │   └── Firefox.php
│   ├── WebExplorerHelperFacade.php
│   └── Facade.php
├── Factory/
│   ├── classes/
│   │   ├── Bike.php
│   │   ├── Car.php
│   │   └── Vehicle.php
│   ├── VehicleFactory.php
│   └── Factory.php
├── Observer/
│   ├── classes/
│   │   ├── DeliveryData.php
│   │   ├── DeliveryWarehouse.php
│   │   ├── Seller.php
│   │   └── Users.php
│   ├── interfaces/
│   │   ├── Observer.php
│   │   └── Subject.php
│   └── Observer.php
├── Prototype/
│   ├── Vehicle.php
│   └── Prototype.php
├── Proxy/
│   ├── interfaces/
│   │   └── DatabaseExecuter.php
│   ├── DatabaseExecuterImpl.php
│   ├── DatabaseExecuterProxy.php
│   └── Proxy.php
├── Singletone/
│   ├── classes/
│   │   ├── EagerInitialization.php
│   │   ├── LazyInitialition.php
│   │   └── ThreadSafe.php
│   └── Singleton.php
├── docker-compose.yml
└── README.md
```

---

## License
This repository is open-source and intended for educational purposes.
