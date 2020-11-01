import { APIPlatform } from './Abstract';
import { VersionSerializer } from 'serializers';

export class Versions extends APIPlatform {
  endpoint = '/versions';
  serializer = new VersionSerializer();
}
