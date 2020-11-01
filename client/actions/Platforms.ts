import { APIPlatform } from './Abstract';
import { Platform, PlatformSerializer } from 'serializers/PlatformSerializer';

export class Platforms extends APIPlatform {
  endpoint = '/platforms';
  serializer = new PlatformSerializer();

  getHomePlatforms() {
    return this.getMany().then(({ data }) => {
      const [linux, macos, windows] = data.map((i) => ({
        img: (i as Platform).logo,
        link: (i as Platform).launchers[0].url,
        system: (i as Platform).name,
      }));
      return {
        data: [
          windows,
          linux,
          macos,
        ]
      }
    })
  }
}
