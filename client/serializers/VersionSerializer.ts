import { APIPlatformInstance, APIPlatformSerializer } from 'serializers/APIPlatformSerializer';
import { VersionAPIInterface, VersionInterface } from 'interfaces/VersionInterface';

export class Version extends APIPlatformInstance implements VersionInterface {
  name: string;

  constructor({ name, ...rest }: VersionAPIInterface) {
    super(rest);
    this.name = name;
  }
}

export class VersionSerializer extends APIPlatformSerializer {
  serialize(version: VersionAPIInterface) {
    return new Version(version);
  }

  serializeMany(versions: VersionAPIInterface[]) {
    return versions.map(version => new Version(version))
  }
}
