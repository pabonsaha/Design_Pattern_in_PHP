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
```

---

## Directory Structure

```plaintext
.
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
├── Factory/
│   ├── classes/
│   │   ├── Bike.php
│   │   ├── Car.php
│   │   └── Vehicle.php
│   ├── VehicleFactory.php
│   └── Factory.php
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
