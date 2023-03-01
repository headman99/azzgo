export class User {
  public provider: string;
  public fullName: string;
  public email: string;
  public avatar: string;
  public uid : string;
  public lastlogin:string;
  public phoneNumber: string;

  constructor(snapshot) {
    this.uid = snapshot.uid;
    this.provider = snapshot.providerId;
    this.fullName = snapshot.displayName ? snapshot.displayName : 'Anonymous';
    this.email = snapshot.email;
    this.avatar = this.loadAvatar(snapshot.photoURL);
    this.lastlogin ='';
    this.phoneNumber = snapshot.phoneNumber;
  }

  // Verify if there is an avatar, if not assign a default one
  loadAvatar(avatarUrl) {
    return avatarUrl ? avatarUrl : 'assets/icon/no-avatar.png';
  }

  // Resolve provider ids
  getProvider(id) {
    var providerNames = [
      '',
      'Twitter',                //1
      'Facebook',               //2
      'GooglePlus',             //3
      'Firebase user/password', //4
      'Anonymous'               //5
    ];
    return providerNames[id];
  }
}
