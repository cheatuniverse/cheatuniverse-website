import { SerializeItemInterface } from 'interfaces/SerializerInterface';
import { APIPlatformItemInterface } from 'serializers/APIPlatformSerializer';

export interface LauncherAPIInterface extends APIPlatformItemInterface {
  name: string;
  url: string;
}

export interface LauncherInterface extends SerializeItemInterface {
  name: string;
  url: string;
}
