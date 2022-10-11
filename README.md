# OSSN-OssnLocation

This component change the current location services (Algolia) to MapBox. The old service was shutting down in May-2022, but still working until September. See more details in [Algolia web site](https://www.algolia.com/blog/product/sunsetting-our-places-feature/)

## Screenshots
Screenshot of OssnLocation
![Screenshot of OssnLocation component](https://www.rafaelamorim.com.br/temp/OssnLocation.png)

Screenshot of OssnLocation admin 
![Screenshot of OssnChat component](https://www.rafaelamorim.com.br/temp/OssnLocation-admin.png)

## Installation

Installation procedures as the same for any component in OSSN. Also, it's required to admin put the [MapBox API Access Token](https://account.mapbox.com/access-tokens/) into OssnLocation admin page. 

## Limitations

* The component was tested in OSSN 6.1 and 6.4, free and premium version. Maybe some adjustments are required in other versions. **Use by your own risk**.
* As a freemium service, MapBox allows 100k requests/month free. More details in https://www.mapbox.com/pricing.

## How to get an MapBox API Key

Just go to [this page.](https://account.mapbox.com/access-tokens)

## Changes

- 1.3
    - Fix loading current language #2, found by Michael Zülsdorff
    - found by Michael Zülsdorff
    - Removed a "Save" text lost in admin page. 
    - Added contributors file
    - Added link to MapBox Access token into readme file
- 1.2
    - Removed a lost div tag in admin form
- 1.1
    - Add verification to load map only when necessary
    - Set OSSN site language in MapBox script 
    - Fix error when user cancel location search by click on X button
- 1.0
    - Initial version. Tested in wall, user posts and groups.

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[OSSN](http://www.opensource-socialnetwork.org/licence)