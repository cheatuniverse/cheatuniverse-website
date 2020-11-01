import { APIPlatformInstance, APIPlatformSerializer } from 'serializers/APIPlatformSerializer';
import { PlatformAPIInterface, PlatformInterface } from 'interfaces/PlatformInterface';
import { LauncherInterface } from 'interfaces/LauncherInterface';
import { LauncherSerializer } from 'serializers/LauncherSerializer';

export class Platform extends APIPlatformInstance implements PlatformInterface {
  name: string;
  launchers: LauncherInterface[];
  logo: string;

  constructor({ name, launchers, logo, ...rest }: PlatformAPIInterface) {
    super(rest);
    this.name = name;
    this.logo = logo;
    this.launchers = new LauncherSerializer().serializeMany(launchers);
  }
}

export class PlatformSerializer extends APIPlatformSerializer {
  serialize(platform: PlatformAPIInterface) {
    return new Platform(platform);
  }

  serializeMany(platforms: PlatformAPIInterface[]) {
    return platforms.map(platform => new Platform(platform))
  }
}
