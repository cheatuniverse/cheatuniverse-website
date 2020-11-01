import { APIPlatformInstance, APIPlatformSerializer } from 'serializers/APIPlatformSerializer';
import { LauncherInterface, LauncherAPIInterface } from 'interfaces/LauncherInterface';

export class Launcher extends APIPlatformInstance implements LauncherInterface {
  name: string;
  url: string;

  constructor({ name, url, ...rest }: LauncherAPIInterface) {
    super(rest);
    this.name = name;
    this.url = url;
  }
}

export class LauncherSerializer extends APIPlatformSerializer {
  serialize(launcher: LauncherAPIInterface) {
    return new Launcher(launcher);
  }

  serializeMany(launchers: LauncherAPIInterface[]) {
    return launchers.map(launcher => new Launcher(launcher))
  }
}
