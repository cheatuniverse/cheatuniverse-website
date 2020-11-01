import { SerializeItemInterface } from 'interfaces/SerializerInterface';
import { APIPlatformItemInterface } from 'serializers/APIPlatformSerializer';
import { LauncherAPIInterface, LauncherInterface } from 'interfaces/LauncherInterface';

export interface PlatformAPIInterface extends APIPlatformItemInterface {
  name: string;
  logo: string;
  launchers: LauncherAPIInterface[];
}

export interface PlatformInterface extends SerializeItemInterface {
  name: string;
  logo: string;
  launchers: LauncherInterface[];
}
