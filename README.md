# jbstronics-blogging-demo

## Introduction

`jbstronics-blogging-demo` is a simple blogging application that demonstrates the usage of
the [https://github.com/jbtronics/settings-bundle](https://github.com/jbtronics/settings-bundle) bundle.

Even though this bundle is well documented, some users have requested to see how to use the bundle in a "real world"
Symfony application.

- [https://github.com/jbtronics/settings-bundle/issues/5](https://github.com/jbtronics/settings-bundle/issues/5)

## Getting Started

You should be able to get started quite easily if you have PHP installed and a `mariadb` or `mysql` database. However, I
recommend that you have [Docker Desktop](https://www.docker.com/products/docker-desktop/) installed and running.

The following instructions assume that you have a running instance
of [Docker Desktop](https://www.docker.com/products/docker-desktop/).

## Installation

- Download or clone the repository.
- Navigate into the `jbtronics-blogging-demo` folder by running the following commands:

```shell
cd jbtronics-blogging-demo/
docker compose up --build -d 
docker exec -it jbtronics-demo bash
symfony composer install

```
