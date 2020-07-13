# oxid-esales/graphql-developer

Provides some tools for GraphQL in the admin backend

If this module is installed in the shop, there is a
a `GraphQL` menu entry in the admin backend. This
has three submenu entries: `GraphIQL` and to inspection
entries for queries and mutations.

## GraphIQL

This is a console to try out queries and mutations.
It is quite self-explanatory. 

The queries run with a special developer usergroup
that has every possible permission, so you don't need
to care about permissions (this feature
is activated in the `PermissionsService` when this
module is installed, so don't install it on a
productive system; even if it is quite save because you
never can get a developer token through a GraphQL query).

That also means, you can't test permissions with this
console.

## Installation

```
composer config repositories.oxid-esales/graphql-developer vcs https://github.com/OXID-eSales/graphql-developer-module
composer require oxid-esales/graphql-developer
```

## Queries and mutations

These entries give you a nice graphical representations of
the GraphQL queries and mutations installed in your OXID eShop.
