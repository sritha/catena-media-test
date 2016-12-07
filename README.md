Catenamedia
===========

A Symfony project created on December 7, 2016, 1:58 pm.

I have created a bundle: CatenaMediaBundle for this test

Code was organised is such a way that it can be extended to multiple types of feeds from multiple providers.

Code Structure:
--------------

- **Controller** : Default Symfony Controller used
- **Entity** : Entity classes which represents database tables
- **Resources - config - doctrine** : YML Annotations for Database mappings
- **ServiceType** : Different kinds of service types are defined here (ex: priceFeed/CachePriceFeed)

######ServiceProvider: 

- **Connector** - It has Connector Factory and different types of connectors(REST/SOAP etc..)
- **Exception** - Exceptions
- **Log** - Request and response Logging
- **Processor** - This is where the Process initiation starts based on request Type and Service Typ
- **Provider** - Individual Provider Information placed here (Ex: WilliamHill). Each Provider will have Request, response and Connector
- **Request** - Prepare the Request based on request type (REST/SOAP etc..)
- **Response** - Prepare Response from different Types (Json/XML/SOAP)
- **RequestType** - Different kinds of Request types are defined here (ex: getHierarchyByMarketType)

Each provider has separate connector, request and response.
At the same time, this structure can be used to implement either SOAP or REST request.

When we wanted to add a new provider/feed it can be simply plugged into Provider Folder.


@Todo:
------

* Logging
* Exception Handling
* Response validation
* Currently Entities are saving to database in individual provider response parser, Ideally it should be handled at ServiceType level.
